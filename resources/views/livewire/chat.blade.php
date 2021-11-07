<div class="md:grid grid-cols-3 gap-6">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white mb-4">
        
        <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 border-b">
            <div class="flow-root">
                <button wire:click.prevent="$toggle('modalOpen')" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-3">Create message</span>
                </button>
            </div>
        </div>

        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 h-96 overflow-y-auto">
            @foreach($chats as $chat) 
                <a 
                    wire:click="setActiveChat({{ $chat->id }})"
                    href="#" 
                    class="relative -m-3 p-3 flex items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150 @if($activeChat && $chat->id === $activeChat->id) bg-gray-100 @endif"
                >
                    <img 
                        class="block h-14 w-14 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ $chat->user()->name }}&color=7F9CF5&background=EBF4FF"
                    >
                    <svg viewBox="0 0 120 120" class="absolute w-4 h-4 left-14 top-14" style="margin: -3px">
                        <circle cx="50" cy="50" r="45" fill="@if(true) green @else silver @endif" stroke="#fff" stroke-width="10" />
                    </svg>
                    <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">
                            {{ $chat->user()->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ $chat->messages->last()->message ?? '' }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

    <div class="col-span-2">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
            @if($activeChat)
                @livewire('chat-message', ['chat' => $activeChat], key($activeChat->id))
            @else
                <p class="p-12">Select message</p>
            @endif
        </div>
    </div>

    @if($modalOpen)
        <div 
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="$toggle('modalOpen')"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <form wire:submit.prevent="submit">
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                {{ __('Create message') }}
                            </h3>
                            <div class="mt-2">
                                <input 
                                    type="text" 
                                    wire:model="userId"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 px-4 rounded" 
                                    placeholder="User ID"
                                    autocomplete="off"
                                >
                                @error('userId')
                                    <p class="text-red-500">
                                        {{ $message }}
                                    </p>
                                @endif
                            </div>
                            <div class="mt-2">
                                <textarea 
                                    type="text" 
                                    wire:model="message"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 px-4 rounded" 
                                    placeholder="{{ __('Message') }}"
                                    autocomplete="off"
                                    rows="4"
                                ></textarea>
                                @error('message')
                                    <p class="text-red-500">
                                        {{ $message }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                            <button 
                                type="submit" 
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm"
                            >
                                {{ __('Create') }}
                            </button>
                            <button 
                                wire:click="$toggle('modalOpen')"
                                type="button" 
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm"
                            >
                                {{ __('Cancel') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('livewire:load', function () {
            const scroll = () => {
                let messages = document.querySelector('.messages');
                if(messages){
                    messages.scrollTop = messages.scrollHeight + 1000;
                }
            }
            window.addEventListener('scroll-chat', () => {
                scroll();
            })
        })
    </script>
</div>
