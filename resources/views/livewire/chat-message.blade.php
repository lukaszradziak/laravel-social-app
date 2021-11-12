<div x-init="window.dispatchEvent(new Event('scroll-chat'))">
    <div class="px-5 py-5 bg-gray-50 space-y-6 sm:flex sm:space-y-0 sm:space-x-10 sm:px-8 border-b">
        <div class="flow-root">
            <a href="{{ route('dashboard.profile', ['user' => $chat->user()?->id ?? 0]) }}" class="relative -m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150">
                <img 
                    class="block h-6 w-6 rounded-full"
                    src="{{ $chat->user()?->profile_photo_url }}"
                >
                <svg viewBox="0 0 120 120" class="absolute w-4 h-4 left-8 top-8" style="margin: -5px">
                    <circle cx="50" cy="50" r="45" class="userStatus{{ $chat->user()?->id }}" fill="@if($chat->user()?->is_online) green @else silver @endif" stroke="#fff" stroke-width="10" />
                </svg>
                <span class="ml-3">{{ $chat->user()?->name ?? '-' }}</span>
            </a>
        </div>
    </div>

    <div class="messages relative gap-6 bg-white px-8 h-80 overflow-y-scroll">
        @foreach($chat->messages()->limited() as $message)
            <div class="flex my-3 @if($message->isOwn) justify-end @endif">
            <div class="flex flex-col space-y-2 max-w-xs mx-2 order-2 items-start">
                <div class="px-4 py-2 rounded-lg inline-block @if($message->isOwn) bg-indigo-500 text-white @else bg-gray-100 text-gray-600 @endif">
                    {{ $message->message }}
                </div>
            </div>
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="submit" class="p-3">
        <div class="flex gap-4">
            <input 
                type="text" 
                wire:model.lazy="message"
                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 px-4 rounded-full" 
                placeholder="Message..."
                autocomplete="off"
            >
            <button 
                type="submit" 
                class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        @error('message')
            <p class="text-red-500 text-sm p-2">
                {{ $message }}
            </p>
        @endif
    </form>
</div>
