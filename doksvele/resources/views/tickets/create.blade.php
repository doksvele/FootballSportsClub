<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Ticket</h2>
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
        <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <select name="game_id">
                <option disabled selected>CHOOSE A MATCH</option>
                @foreach ($tickets as $ticket)
                <option value="{{ $ticket->id }}">{{ $ticket->id }}</option>
                @endforeach
              </select>
              <div class="label-input">
                <x-jet-label value="{{ __('Price') }}" />
                <x-jet-input type="number" name="price" class="mt-1 block w-full" />
              </div>
              <div class="label-input">
                <x-jet-label value="{{ __('Quantity') }}" />
                <x-jet-input type="number" name="quantity" class="mt-1 block w-full" />
              </div>
              <div class="label-input">
                <x-jet-label value="{{ __('Description') }}" />
                <x-jet-input type="text" name="description" class="mt-1 block w-full" />
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
