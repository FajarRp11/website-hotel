<x-app-layout>
    <section class="min-h-screen w-full pt-24 px-8 gap-4 flex flex-col justify-center items-center">
        <div id="date-range-picker" date-rangepicker class="flex items-center">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
            </div>
        </div>

        <div class="flex gap-4 flex-wrap justify-between">
            @foreach ($rooms as $room)
                <div class="max-w-72 h-[412px] relative p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-lg w-60 h-36 object-center object-cover" src="{{ asset('storage/' . $room->image) }}" alt="Room {{ $room->room_number }}" />
                <div class="my-4">
                    <h5 class="mb-2 font-semibold tracking-tight text-gray-900 dark:text-white">Room Number: {{ $room->room_number }}</h5>
                    <h2 class="mb-2 text-3xl font-black tracking-tight text-gray-900 dark:text-white">Rp. {{ number_format($room->price_per_night, 0, ',', '.') }}</h2>
                    <!-- Facilities dengan icon dari database -->
                    <div class="space-y-3 mb-6">
                        @foreach($room->facilities as $facility)
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('storage/' . $facility->image) }}" class="w-4 h-4" alt="{{ $facility->name }}">
                            <p class="text-gray-800 text-sm font-semibold">{{ $facility->name }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button class="absolute left-5 bottom-5 bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    Choose
                </button>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>