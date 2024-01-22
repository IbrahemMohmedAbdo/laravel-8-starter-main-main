<x-layouts.app :title="__('Merchants')">

  <div class="container mx-auto mt-8">
      <h1 class="text-2xl font-semibold mb-4">Merchants</h1>
      @if(auth()->user()->role == 'operation')
      <a href="{{ route('export') }}" class="btn btn-primary">Download Excel</a>
      @endif
      @if ($merchants->isEmpty())
          <p class="text-gray-600">No merchants found.</p>
      @else
          <table class="min-w-full border rounded overflow-hidden">
              <thead class="bg-gray-100 border-b">
                  <tr>
                      <th class="py-2 px-4">Name</th>
                      <th class="py-2 px-4">Email</th>
                      <th class="py-2 px-4">Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($merchants as $merchant)
                      <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                          <td class="py-2 px-4">{{ $merchant->fullname ?? '' }}</td>
                          <td class="py-2 px-4">{{ $merchant->email ?? '' }}</td>
                          <td class="py-2 px-4">
                            @if (auth()->user()->role == 'admin')

                              <a href="{{ route('merchants.show', $merchant) }}" class="text-blue-500 hover:underline">Show</a>
                              <form action="{{ route('merchants.destroy', $merchant) }}" method="POST" class="inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                              </form>
                              @elseif (auth()->user()->role == 'operation')
                              <a href="{{ route('merchants.edit', $merchant) }}" class="text-blue-500 hover:underline">Edit</a>
                              @endif
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @endif
  </div>




</x-layouts.app>

