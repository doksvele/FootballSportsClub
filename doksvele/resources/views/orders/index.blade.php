<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orders</h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if ($message = Session::get('success'))
      <div class="text-green-600">
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mystyle">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>USER EMAIL</th>
                <th>AMOUNT</th>
                <th>TICKET ID</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->ticket_id }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
