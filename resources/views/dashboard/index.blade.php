<x-app-layout leftMenu="true">

    <div class="bg-white shadow sm:rounded-lg mb-4">
        <div class="px-4 py-5 sm:p-6">

            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <img
                        class="inline-block h-10 w-10 rounded-full"
                        src="{{ auth()->user()->profile_photo_url }}"
                        alt=""
                    >
                </div>
                <div class="min-w-0 flex-1">
                    <form action="#">
                        <div class="border-b border-gray-200 focus-within:border-indigo-600">
                            <label
                                for="comment"
                                class="sr-only"
                            >{{ __('Add your post') }}...</label>
                            <textarea
                                rows="3"
                                name="comment"
                                id="comment"
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
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <div class="sm:hidden">
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
                <option selected>My Account</option>

                <option>Company</option>

                <option>Team Members</option>

                <option>Billing</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <nav
                class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200"
                aria-label="Tabs"
            >
                <!-- Current: "text-gray-900", Default: "text-gray-500 hover:text-gray-700" -->
                <a
                    href="#"
                    class="text-gray-900 rounded-l-lg group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                    aria-current="page"
                >
                    <span>{{ __('Latest') }}</span>
                    <span
                        aria-hidden="true"
                        class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"
                    ></span>
                </a>

                <a
                    href="#"
                    class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                >
                    <span>{{ __('Friends') }}</span>
                    <span
                        aria-hidden="true"
                        class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"
                    ></span>
                </a>

                <a
                    href="#"
                    class="text-gray-500 hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                >
                    <span>{{ __('Top') }}</span>
                    <span
                        aria-hidden="true"
                        class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"
                    ></span>
                </a>

                <a
                    href="#"
                    class="text-gray-500 rounded-r-lg  hover:text-gray-700 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10"
                >
                    <span>{{ __('Most views') }}</span>
                    <span
                        aria-hidden="true"
                        class="bg-transparent absolute inset-x-0 bottom-0 h-0.5"
                    ></span>
                </a>
            </nav>
        </div>
    </div>


    <!-- This example requires Tailwind CSS v2.0+ -->

    @for ($i = 0; $i < 100; $i++)
        <div class="bg-white shadow overflow-hidden sm:rounded-md mb-4">
            <a
                href="#"
                class="block hover:bg-gray-50"
            >
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                            <img
                                class="h-12 w-12 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt=""
                            >
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <p class="text-sm font-medium text-indigo-600 truncate">Ricardo Cooper</p>
                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                    <span class="truncate">
                                        Applied on
                                        <time datetime="2020-01-07">January 7, 2020</time>
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
            <div class="flex items-center px-4 py-4 sm:px-6 ">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores at molestias numquam doloribus eius
                nobis,
                odio quod eveniet deserunt corrupti deleniti incidunt cupiditate repudiandae sequi vel! Modi animi ullam
                odit.
            </div>
        </div>
    @endfor

    </div>

</x-app-layout>
