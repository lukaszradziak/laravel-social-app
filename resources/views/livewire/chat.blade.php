<div class="md:grid grid-cols-3 gap-6">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white mb-4">
        
        <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 border-b">
            <div class="flow-root">
                <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                <span class="ml-3">Create message</span>
                </a>
            </div>
        </div>

        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
            @foreach($rooms as $room) 
                <a href="#" class="relative -m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                <img 
                    class="block h-14 w-14 rounded-full"
                    src="https://ui-avatars.com/api/?name={{ $room['user'] }}&color=7F9CF5&background=EBF4FF"
                >
                <svg viewBox="0 0 120 120" class="absolute w-4 h-4 left-14 top-14" style="margin: -3px">
                    <circle cx="50" cy="50" r="45" fill="@if($room['online']) green @else silver @endif" stroke="#fff" stroke-width="10" />
                </svg>
                <div class="ml-4">
                <p class="text-base font-medium text-gray-900">
                    {{ $room['user'] }}
                </p>
                <p class="mt-1 text-sm text-gray-500">
                    {{ $room['message'] }}
                </p>
                </div>
                </a>
            @endforeach
        </div>

    </div>

    <div class="col-span-2">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
           
           <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 border-b">
              <div class="flow-root">
                 <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                    <img 
                       class="block h-6 w-6 rounded-full"
                       src="https://ui-avatars.com/api/?name={{ $activeChat['user'] }}&color=7F9CF5&background=EBF4FF"
                    >
                    <span class="ml-3">{{ $activeChat['user'] }}</span>
                 </a>
              </div>
           </div>

           <div class="messages relative gap-6 bg-white px-8 h-96 overflow-y-scroll">
                @foreach($activeChat['messages'] as $msg)
                    <div class="flex my-3 @if($msg['own']) justify-end @endif">
                       <div class="flex flex-col space-y-2 max-w-xs mx-2 order-2 items-start">
                          <div class="px-4 py-2 rounded-lg inline-block @if($msg['own']) bg-indigo-500 text-white @else bg-gray-100 text-gray-600 @endif">
                             {{ $msg['message'] }}
                          </div>
                       </div>
                    </div>
                @endforeach
           </div>

           <form wire:submit.prevent="sendMessage" class="p-4 flex gap-4">
                <input 
                    type="text" 
                    wire:model="message"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 px-4 rounded-full" 
                    placeholder="Message..."
                    autocomplete="off"
                >
                <button type="submit" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
           </form>

        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            const messages = document.querySelector('.messages');
            window.addEventListener('new-message', () => {
                messages.scrollTop = messages.scrollHeight + 1000;
            })
        })
    </script>
</div>
