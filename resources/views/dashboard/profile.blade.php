<x-app-layout leftMenu="true">

  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
    
    <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
      <div class="lg:col-start-8 lg:col-span-5">
        <div class="flex justify-between">
          <h1 class="flex items-center text-xl font-medium text-gray-900">
            <svg viewBox="0 0 120 120" class="w-4 h-4">
                <circle cx="50" cy="50" r="45" class="userStatus{{ $user->id }}" fill="@if($user->is_online) green @else silver @endif" stroke="#fff" stroke-width="10" />
            </svg>
            <span>{{ $user->name }}</span>
          </h1>
        </div>
       
      </div>

      <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3">
        <h2 class="sr-only">{{ __('Images') }}</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-8">
          <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="lg:col-span-2 lg:row-span-2 rounded-lg w-full">
        </div>
      </div>

      <div class="lg:col-span-5">
        <div class="mt-10">
          <h2 class="text-sm font-medium text-gray-900">{{ __('Description') }}</h2>
          <div class="mt-4 prose prose-sm text-gray-500">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi consequatur aliquam voluptatum, expedita nostrum dolore vel nulla accusantium fugit quaerat dolores itaque voluptatem eius ducimus? Delectus voluptate velit odio quis.</p>
          </div>
        </div>

        <a 
          href="{{ route('dashboard.friends-request', ['user' => $user->id]) }}" 
          class="mt-8 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            {{ __('Friends request') }}
        </a>

        <a 
          href="#" 
          class="mt-8 w-full bg-gray-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          {{ __('Send a message') }}
        </a>

        <div class="mt-8 border-t border-gray-200 pt-8">
          <h2 class="text-sm font-medium text-gray-900">{{ __('Details') }}</h2>

          <div class="mt-4 prose prose-sm text-gray-500">
            <ul role="list">
              
                <li>Love pets</li>
                <li>Vegan</li>
                <li>Sport</li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>

</x-app-layout>
