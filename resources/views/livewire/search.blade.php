<div 
    class="relative w-full"
    x-data="{ visible: true }"
>
    <input 
        @click="visible = true" 
        @keydown="visible = true"
        type="search" 
        wire:model="query"
        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" 
        placeholder="{{ __('Search...') }}"
        autocomplete="off"
    >
    @if(count($users) || $errors->has('query'))
        <ul 
            x-show="visible"
            @click.away="visible = false"
            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm"
            tabindex="-1" 
            role="listbox" 
            aria-labelledby="listbox-label" 
            aria-activedescendant="listbox-option-3"
        >
            @error('query')
                <li class="text-gray-500 cursor-pointer select-none relative py-2 pl-3 pr-9 bg-gray-50 ">
                    {{ $message }}
                </div>
            @endif
            @foreach($users as $user)
                <li class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:text-white hover:bg-indigo-600">
                    <a 
                        href="{{ route('dashboard.profile', $user->id) }}"
                        class="flex items-center"
                    >
                        <img 
                            src="{{ $user->profile_photo_url }}" 
                            alt="{{ $user->name }}" 
                            class="flex-shrink-0 h-6 w-6 rounded-full"
                        >
                        <span class="font-normal ml-3 block truncate">
                            {{ $user->name }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>