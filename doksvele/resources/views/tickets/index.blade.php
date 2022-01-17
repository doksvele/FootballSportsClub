<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tickets</h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a class="button-green" href="{{ route('tickets.create') }}">ADD NEW TICKET</a>
      @if ($message = Session::get('success'))
      <div class="text-green-600">
        <p>{{ $message }}</p>
      </div>
      @endif
      @foreach ($tickets as $ticket)
      <div class="tickets">
        <table class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <tr><td colspan="2">{{ $ticket->date }}</td><td colspan="2" class="right">{{ $ticket->tournament }}</td></tr>
          <tr>
            <td><img src="{{ asset('img/lv.svg') }}" alt="latvia"><h3>Latvia</h3></td>
            <td><h2>{{ $ticket->result }}</h2>{{ $ticket->place }}</td>
            <td><img src="/image/{{ $ticket->image }}" alt="image"><h3>{{ $ticket->name }}</h3></td>
            <td><h2 class="price">{{ $ticket->price }}€</h2></td>
          </tr>
          <tr class="description"><td colspan="3">{{ $ticket->description }}</td><td><a href="{{ route('orders.create') }}"><button class="mybtn">BUY A TICKET</button></a></td></tr>
        </table>
      </div>
      @endforeach
    </div>
  </div>
</x-app-layout>
