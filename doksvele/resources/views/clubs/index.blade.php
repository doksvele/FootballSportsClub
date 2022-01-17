<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clubs</h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a class="button-green" href="{{ route('clubs.create') }}">ADD NEW CLUB</a>
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
                <th>IMAGE</th>
                <th>ACTIONS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($clubs as $club)
              <tr>
                <td>{{ $club->id }}</td>
                <td>{{ $club->name }}</td>
                <td><img src="/image/{{ $club->image }}" alt="image"></td>
                <td>
                  <form action="{{ route('clubs.destroy', $club->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    <a class="button-yellow" href="{{ route('clubs.edit',$club->id) }}">EDIT</a>
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
        {!! $clubs->links() !!}
      </div>
    </div>
  </div>
</x-app-layout>
