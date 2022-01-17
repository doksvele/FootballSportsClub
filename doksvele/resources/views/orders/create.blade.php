<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Order</h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a class="button-gray" href="{{ route('tickets.index') }}">BACK</a>
      @if ($errors->any())
      <div class="text-red-600">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
      </div>
      @endif
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <h3>USER EMAIL</h3>
              <h3>TICKET ID</h3>
              <div class="label-input">
                <x-jet-label value="{{ __('Amount') }}" />
                <x-jet-input type="number" name="amount" class="mt-1 block w-full" />
              </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="button-blue">SUBMIT</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
