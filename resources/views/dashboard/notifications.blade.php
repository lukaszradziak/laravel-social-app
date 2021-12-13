<x-app-layout leftMenu="true">

    <div
        x-init="Livewire.emit('reloadNotifications')"
        class="bg-white shadow overflow-hidden sm:rounded-md"
    >
        <div class="bg-white px-4 py-5 border-b border-gray-200 bg-gray-50 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ __('Notifications') }}
            </h3>
        </div>
        <ul
            role="list"
            class="divide-y divide-gray-200"
        >
            @if ($notifications->count())
                @foreach ($notifications as $notification)
                    <li>
                        <a
                            href="#"
                            class="block hover:bg-gray-50 @if (!$notification->read_at) bg-yellow-100 hover:bg-yellow-200 @endif"
                        >
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <img
                                            class="h-12 w-12 rounded-full"
                                            src="{{ $notificationUser->profile_photo_url ?? 'https://ui-avatars.com/api/?name=Notification&color=7F9CF5&background=EBF4FF' }}"
                                            alt="Notification"
                                        >
                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-indigo-600 truncate">
                                                From {{ $notificationUser->name ?? __('Guest') }}</p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                                <span
                                                    class="truncate">{{ str_replace('App\Notifications\\', '', $notification->type) }}</span>
                                            </p>
                                        </div>
                                        <div class="flex items-center">
                                            <p class="text-sm text-gray-600">
                                                <time
                                                    datetime="{{ $notification->created_at }}">{{ $notification->created_at->ago() }}</time>
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
                    </li>
                @endforeach
            @else
                <div class="py-8 px-6 text-gray-500">{{ __('Empty') }}</div>
            @endif
        </ul>
    </div>

    <div class="py-4">
        {{ $notifications->links() }}
    </div>


</x-app-layout>
