<div>
    @if ($friendRequests->count())
        <div class="bg-white shadow sm:rounded-lg mb-4">

            <div class="border-b border-gray-200 bg-gray-50 px-4 py-5 sm:px-6">
                {{ __('Requests') }}
            </div>

            <div class="px-4 py-5 sm:px-6">
                <ul
                    role="list"
                    class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-12 sm:space-y-0 lg:gap-x-8"
                >
                    @foreach ($friendRequests as $user)
                        <li>
                            <div class="flex items-center space-x-4 lg:space-x-6">
                                <a href="{{ route('dashboard.profile', ['user' => $user->sender->id]) }}">
                                    <img
                                        class="w-16 h-16 rounded-full lg:w-20 lg:h-20"
                                        src="{{ $user->sender->profile_photo_url }}"
                                        alt="{{ $user->sender->name }}"
                                    >
                                </a>
                                <div class="font-medium text-lg leading-6 space-y-1">
                                    <a href="{{ route('dashboard.profile', ['user' => $user->sender->id]) }}">
                                        <h3>{{ $user->sender->name }}</h3>
                                    </a>
                                    <button
                                        wire:click="modalAcceptFriend({{ $user->sender->id }})"
                                        class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm"
                                    >
                                        {{ __('Accept') }}
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="bg-white shadow sm:rounded-lg">

        <div class="border-b border-gray-200 bg-gray-50 px-4 py-5 sm:px-6">
            {{ __('Friends') }}
        </div>

        <div class="px-4 py-5 sm:px-6">
            @if ($friends->count())

                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 mb-4">
                    @foreach ($friends as $user)
                        <div class="group relative">
                            <a
                                href="{{ route('dashboard.profile', ['user' => $user->id]) }}"
                                class="block w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 "
                            >
                                <img
                                    src="{{ $user->profile_photo_url }}"
                                    alt="Front of men&#039;s Basic Tee in black."
                                    class="w-full h-full object-center object-cover lg:w-full lg:h-full"
                                >
                            </a>

                            <div class="flex justify-between items-center mt-2">
                                <a
                                    href="{{ route('dashboard.profile', ['user' => $user->id]) }}"
                                    class="flex justify-center items-center"
                                >
                                    <svg
                                        viewBox="0 0 120 120"
                                        class="w-4 h-4"
                                    >
                                        <circle
                                            cx="50"
                                            cy="50"
                                            r="45"
                                            class="userStatus{{ $user->id }}"
                                            fill="@if ($user->is_online) green @else silver @endif"
                                            stroke="#fff"
                                            stroke-width="10"
                                        />
                                    </svg>
                                    <p class="text-indigo-400">{{ $user->name }}</p>
                                </a>

                                <ul
                                    role="list"
                                    class="flex items-center"
                                >
                                    <li>
                                        <a
                                            href="{{ route('dashboard.chat') }}"
                                            class="text-gray-400 hover:text-gray-300"
                                        >
                                            <span class="sr-only">{{ __('Chat') }}</span>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            wire:click="modalDeleteFriend({{ $user->id }})"
                                            class="text-gray-400 hover:text-gray-300"
                                        >
                                            <span class="sr-only">{{ __('Remove') }}</span>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $friends->links() }}
            @else
                <p>{{ __('Empty') }}</p>
            @endif
        </div>
    </div>

    @if ($deleteFriendId)
        <div
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"
                    wire:click="modalDeleteFriend(null)"
                ></div>

                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                >&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg
                                class="h-6 w-6 text-red-600"
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
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-title"
                            >
                                {{ __('Are you sure?') }}
                            </h3>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                        <button
                            type="button"
                            wire:click="deleteFriend()"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                        >
                            Delete
                        </button>
                        <button
                            type="button"
                            wire:click="modalDeleteFriend(null)"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($acceptFriendId)

        <div
            class="fixed z-10 inset-0 overflow-y-auto"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div
                    wire:click="modalAcceptFriend(null)"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    aria-hidden="true"
                ></div>

                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                >&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <!-- Heroicon name: outline/check -->
                            <svg
                                class="h-6 w-6 text-green-600"
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
                                    d="M5 13l4 4L19 7"
                                />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                                id="modal-title"
                            >
                                {{ __('Are you sure?') }}
                            </h3>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                        <button
                            wire:click="acceptFriend()"
                            type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm"
                        >
                            {{ __('Accept') }}
                        </button>
                        <button
                            wire:click="modalAcceptFriend(null)"
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm"
                        >
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
