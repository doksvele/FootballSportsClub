<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a class="button-green" href="{{ route('users.create') }}">ADD NEW USER</a>
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
                <th>NAME</th>
                <th>EMAIL</th>
                <th>EMAIL VERIFIED AT</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    <a class="button-yellow" href="{{ route('users.edit',$user->id) }}">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-red">DELETE</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-center mylinks">
        {!! $users->links() !!}
      </div>
    </div>
  </div>
</x-app-layout>
