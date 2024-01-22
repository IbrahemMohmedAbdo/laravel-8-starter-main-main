

<x-layouts.app :title="__('Merchants Details')">
  <div class="container mx-auto mt-8">
      <h1 class="text-2xl font-semibold mb-4">{{ __('Merchant Details') }}</h1>

      <div class="flex flex-col">
          <div class="mb-2">
              <span class="font-bold">{{ __('Username') }}:</span> {{ $merchant->fullname }}
          </div>

          <div class="mb-2">
              <span class="font-bold">{{ __('Email') }}:</span> {{ $merchant->email }}
          </div>
      </div>

      <a href="{{ route('merchants.index') }}" class="text-blue-500 hover:underline">{{ __('Back to Merchants') }}</a>
  </div>
</x-layouts.app>


