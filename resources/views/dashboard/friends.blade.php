<x-app-layout leftMenu="true">

  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
    <h2>Friends page</h2>
    <h3>Pending</h3>

    @foreach($pendingFriends as $user)
      <li>{{ $user->sender->name ?? '-' }}</li>
    @endforeach

    <h3>Accepted</h3>
    
    @foreach($friends as $user)
      <li>{{ $user->sender->name ?? '-' }}</li>
    @endforeach
  </div>

</x-app-layout>
