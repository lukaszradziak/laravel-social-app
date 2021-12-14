<div>

    <div
        class="space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">

        @foreach ($items as $item)
            <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200 bg-white">
                <div class="p-6">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">{{ $item->name }}</h2>
                    <p class="mt-4 text-sm text-gray-500 h-36">{{ $item->description }}</p>
                    <p class="mt-8">
                        <span class="text-4xl font-extrabold text-gray-900">{{ $item->price }}</span>
                    </p>
                    <a
                        href="#"
                        class="mt-8 block w-full bg-gray-800 border border-gray-800 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-gray-900"
                    >{{ __('Buy') }}</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
