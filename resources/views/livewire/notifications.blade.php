<div class="relative">
    <a href="{{ route('dashboard.notifications') }}" class="flex-shrink-0 bg-white rounded-full text-gray-400 hover:text-gray-500 focus:outline-none ">
        <span class="sr-only">View notifications</span>
        <!-- Heroicon name: outline/bell -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span 
            class="notifications-count absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"
        >
            {{ $count }}
        </span>
    </a>

    @if($notification)
    <div aria-live="assertive" class="fixed z-40 inset-0 flex items-end px-4 py-6 pointer-events-none sm:py-20 sm:items-start">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
            <div 
                class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5 hover:bg-gray-50"
            >
            <div class="w-0 flex-1 p-4">
                <a href="{{ route('dashboard.notifications') }}" class="flex items-start">
                    <div class="flex-shrink-0 pt-0.5">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Notification&color=7F9CF5&background=EBF4FF" alt="">
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            Notification
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ $notification['type'] }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="mr-4 flex-shrink-0 flex items-center">
                <button 
                    wire:click="close"
                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                  <span class="sr-only">Close</span>
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
        </div>
    </div>
    @endif

</div>
