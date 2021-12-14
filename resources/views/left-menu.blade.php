<div class="hidden lg:block lg:col-span-3 xl:col-span-2 py-12 pt-20">
    <nav
        aria-label="Sidebar"
        class="sticky top-20 divide-y divide-gray-300"
    >
        <div class="pb-8 space-y-1">

            <a
                href="{{ route('dashboard.index') }}"
                class="@if (request()->routeIs('dashboard.index')) bg-gray-200 text-gray-900 @endif text-gray-600 hover:bg-gray-50  group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                aria-current="page"
            >
                <svg
                    class="@if (request()->routeIs('dashboard.index')) text-gray-500 group-hover:text-gray-500 @else text-gray-400 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6"
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
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />
                </svg>
                <span class="truncate">
                    {{ __('Dashboard') }}
                </span>
            </a>

            <a
                href="{{ route('dashboard.premium') }}"
                class="text-gray-600 hover:bg-gray-50  group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                aria-current="page"
            >
                <svg
                    class="text-gray-400 flex-shrink-0 -ml-1 mr-3 h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                    />
                </svg>
                <span class="truncate">
                    {{ __('Premium') }}
                </span>
            </a>

            <a
                href="{{ route('dashboard.friends') }}"
                class="@if (request()->routeIs('dashboard.friends')) bg-gray-200 text-gray-900 @endif text-gray-600 hover:bg-gray-50  group flex items-center px-3 py-2 text-sm font-medium rounded-md"
                aria-current="page"
            >
                <svg
                    class="@if (request()->routeIs('dashboard.friends')) text-gray-500 group-hover:text-gray-500 @else text-gray-400 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6"
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
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                    />
                </svg>
                <span class="truncate">
                    {{ __('Friends') }}
                </span>
            </a>

            <a
                href="{{ route('dashboard.chat') }}"
                class="@if (request()->routeIs('dashboard.chat')) bg-gray-200 text-gray-900 @endif text-gray-600 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
            >
                <svg
                    class="@if (request()->routeIs('dashboard.chat')) text-gray-500 group-hover:text-gray-500 @else text-gray-400 @endif flex-shrink-0 -ml-1 mr-3 h-6 w-6"
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
                        d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                    />
                </svg>
                <span class="truncate">
                    {{ __('Chat') }}
                </span>
            </a>

        </div>

        <div class="pt-10">
            <p
                class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider"
                id="communities-headline"
            >
                {{ __('Hashtags') }}
            </p>
            <div
                class="mt-3 space-y-2"
                aria-labelledby="communities-headline"
            >
                @foreach (\App\Models\Hashtag::take(10)->get() as $hashtag)
                    <a
                        href="{{ route('dashboard.index', ['hashtag' => $hashtag->name]) }}"
                        class="group flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50"
                    >
                        <span class="truncate flex items-center">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 mr-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"
                                />
                            </svg>
                            {{ $hashtag->name }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

    </nav>
</div>
