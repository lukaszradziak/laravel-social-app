<div>
    <div class="bg-white shadow sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:p-6">

            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <img
                        class="inline-block h-10 w-10 rounded-full"
                        src="{{ auth()->user()->profile_photo_url }}"
                        alt="{{ auth()->user()->name }}"
                    >
                </div>
                <div class="min-w-0 flex-1">
                    <form wire:submit.prevent="submit">
                        <div class="border-b border-gray-200 focus-within:border-indigo-600">
                            <label
                                for="content"
                                class="sr-only"
                            >{{ __('Add your post') }}...</label>
                            <textarea
                                rows="3"
                                name="content"
                                id="content"
                                wire:model.defer="content"
                                class="block w-full border-0 border-b border-transparent p-0 pb-2 resize-none focus:ring-0 focus:border-indigo-600 sm:text-sm"
                                placeholder="{{ __('Add your post') }}..."
                            ></textarea>
                        </div>
                        <div class="pt-2 flex justify-between">
                            <div class="flex items-center space-x-5">
                                <div class="flow-root">
                                    <button
                                        type="button"
                                        class="-m-2 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500"
                                    >
                                        <!-- Heroicon name: outline/paper-clip -->
                                        <svg
                                            class="h-6 w-6"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            aria-hidden="true"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                            />
                                        </svg>
                                        <span class="sr-only">Attach a file</span>
                                    </button>
                                </div>
                                <div class="flow-root">
                                    <div>
                                        <label
                                            id="listbox-label"
                                            class="sr-only"
                                        >
                                            Your mood
                                        </label>
                                        <div class="relative">
                                            <button
                                                type="button"
                                                class="relative -m-2 w-10 h-10 rounded-full inline-flex items-center justify-center text-gray-400 hover:text-gray-500"
                                                aria-haspopup="listbox"
                                                aria-expanded="true"
                                                aria-labelledby="listbox-label"
                                            >
                                                <span class="flex items-center justify-center">
                                                    <!-- Placeholder label, show/hide based on listbox state. -->
                                                    <span>
                                                        <!-- Heroicon name: outline/emoji-happy -->
                                                        <svg
                                                            class="flex-shrink-0 h-6 w-6"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor"
                                                            aria-hidden="true"
                                                        >
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                            />
                                                        </svg>
                                                        <span class="sr-only">
                                                            Add your mood
                                                        </span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    Post
                                </button>
                            </div>
                        </div>

                        @error('content')
                            <p class="text-red-500 text-sm p-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        {{-- <div class="sm:hidden">
            <label
                for="tabs"
                class="sr-only"
            >Select a tab</label>
            <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
            <select
                id="tabs"
                name="tabs"
                class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
            >
                <option selected>Latest</option>

                <option>Friends</option>

                <option>Top</option>

                <option>Most views</option>
            </select>
        </div> --}}

        <div class="hidden sm:block">
            <nav
                class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200"
                aria-label="Tabs"
            >
                @if ($hashtag)
                    <a
                        href="{{ route('dashboard.index', ['hashtag' => $hashtag]) }}"
                        class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                        aria-current="page"
                    >
                        <span>#{{ $hashtag }}</span>
                        <span
                            aria-hidden="true"
                            class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"
                        ></span>
                    </a>
                    <a
                        href="{{ route('dashboard.index') }}"
                        class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                    >

                        <span>{{ __('Back to all posts') }}</span>
                        <span
                            aria-hidden="true"
                            class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"
                        ></span>
                    </a>
                @else
                    <a
                        href="{{ route('dashboard.index') }}"
                        class="text-gray-900 @if ($tab) text-gray-500 @endif rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                        aria-current="page"
                    >
                        <span>{{ __('Latest') }}</span>
                        <span
                            aria-hidden="true"
                            class="@if (!$tab) bg-indigo-500 @endif absolute inset-x-0 bottom-0 h-0.5"
                        ></span>
                    </a>

                    <a
                        href="{{ route('dashboard.index', ['tab' => 'top']) }}"
                        class="text-gray-900 @if ($tab !== 'top') text-gray-500 @endif rounded-r-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                    >
                        <span>{{ __('Top') }}</span>
                        <span
                            aria-hidden="true"
                            class="@if ($tab === 'top') bg-indigo-500 @endif  absolute inset-x-0 bottom-0 h-0.5"
                        ></span>
                    </a>
                @endif
            </nav>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4">
            <a
                href="{{ route('dashboard.profile', ['user' => $post->user?->id]) }}"
                class="block hover:bg-gray-50"
            >
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                            <img
                                class="h-12 w-12 rounded-full"
                                src="{{ $post->user?->profile_photo_url }}"
                                alt="{{ $post->user?->name }}"
                            >
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <p class="text-sm font-medium text-indigo-600 truncate">{{ $post->user?->name }}</p>
                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                    <span class="truncate">
                                        <time datetime="{{ $post->created_at }}">{{ $post->created_at }}</time>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg
                            class="h-5 w-5 text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                </div>
            </a>
            <div class="flex items-center px-4 py-4 sm:px-6">
                <x-post.content :post="$post" />
            </div>
            <div class="px-4 py-4 pt-0 sm:px-6">
                <button
                    class="flex  @if ($post->isLikedBy(auth()->user())) text-gray-800 @else text-gray-400 @endif"
                    wire:click="like({{ $post->id }})"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
                        />
                    </svg>
                    <span>{{ $post->likers_count }}</span>
                </button>

            </div>
        </div>
    @endforeach

    @if ($posts->hasPages())
        <div class="rounded-md bg-gray-200 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg
                        class="animate-spin h-5 w-5 text-gray-600"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        ></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-gray-800">
                        {{ __('Load more') }}...
                    </h3>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('livewire:load', function() {
            const check = () => {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    Livewire.emit('loadMore')
                }
            }
            window.onscroll = function() {
                check();
            };
            check();
        });
    </script>
</div>
