<!-- resources/views/merchants/edit.blade.php -->

<x-layouts.app :title="__('Edit Merchant')">
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">


    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">


      <x-alert type="success" class="mb-4 font-medium text-sm text-green-600" />
      <x-alert type="error" class="mb-4 font-medium text-sm text-red-600" />


          <x-form :action="route('merchants.update', $merchant)" novalidate>
              @method('PUT')

              <div class="mt-4">
                  <x-label for="fullname" class="block font-medium text-sm text-gray-700" />
                  @php
                      $borderColor = $errors->has('fullname') ? 'border-red-300 focus:border-red-300 focus:ring-red-300' : 'border-gray-300 focus:border-gray-300 focus:ring-gray-300';
                  @endphp
                  <x-input id="fullname" name="fullname" required
                      class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 {{ $borderColor }}"
                      value="{{ old('fullname', $merchant->fullname ?? '') }}" />
                  <x-error field="fullname" class="mt-1 font-medium text-sm text-red-600" />
              </div>

              <div class="mt-4">
                  <x-label for="email" class="block font-medium text-sm text-gray-700" />
                  @php
                      $borderColor = $errors->has('email') ? 'border-red-300 focus:border-red-300 focus:ring-red-300' : 'border-gray-300 focus:border-gray-300 focus:ring-gray-300';
                  @endphp
                  <x-email id="email" name="email" required
                      class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 {{ $borderColor }}"
                      value="{{ old('email', $merchant->email ?? '') }}" />
                  <x-error field="email" class="mt-1 font-medium text-sm text-red-600" />
              </div>

              <div class="mt-4">
                  <x-label for="phone" class="block font-medium text-sm text-gray-700" />
                  @php
                      $borderColor = $errors->has('phone') ? 'border-red-300 focus:border-red-300 focus:ring-red-300' : 'border-gray-300 focus:border-gray-300 focus:ring-gray-300';
                  @endphp
                  <x-input id="phone" name="phone" required
                      class="mt-1 block w-full rounded-md shadow-sm focus:ring focus:ring-opacity-50 {{ $borderColor }}"
                      value="{{ old('phone', $merchant->phone ?? '') }}" />
                  <x-error field="phone" class="mt-1 font-medium text-sm text-red-600" />
              </div>



              <!-- Submit Button -->
              <div class="mt-4 py-5">
                  <button type="submit"
                      class="items-center justify-center float-right px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                      Update Merchant
                  </button>
              </div>
          </x-form>
      </div>
  </div>
</x-layouts.app>
