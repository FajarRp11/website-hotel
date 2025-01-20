<x-app-layout>
    <section class="min-h-screen w-full pt-24 px-8 gap-4 flex flex-col justify-center">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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

        <div class="flex gap-4 flex-wrap">
            @foreach ($rooms as $room)
                <div class="max-w-72 h-[412px] relative p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-lg w-60 h-36 object-center object-cover" src="{{ asset('storage/' . $room->image) }}" alt="Room {{ $room->room_number }}" />
                    <div class="my-4">
                        <div class="flex justify-between items-center mb-2">
                            <h5 class="font-semibold tracking-tight text-gray-900 dark:text-white">Room Number: {{ $room->room_number }}</h5>
                            <p class="text-gray-500 text-sm">{{ ucfirst($room->room_type) }}</p>
                        </div>
                        <h2 class="mb-2 text-3xl font-black tracking-tight text-gray-900 dark:text-white">Rp. {{ number_format($room->price_per_night, 0, ',', '.') }}</h2>
                        <!-- Facilities dengan icon dari database -->
                        <div class="space-y-3 mb-6">
                            @forelse($room->facilities as $facility)
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('storage/' . $facility->image) }}" class="w-4 h-4" alt="{{ $facility->name }}">
                                    <p class="text-gray-800 text-sm font-semibold">{{ $facility->name }}</p>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No facilities</p>
                            @endforelse
                        </div>
                    </div>
                    <form action="{{ route('booking.store', $room->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="check_in_date" id="check_in_date_{{ $room->id }}">
                        <input type="hidden" name="check_out_date" id="check_out_date_{{ $room->id }}">
                        <button type="submit" class="absolute left-5 bottom-5 bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            Choose
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDate = document.getElementById('datepicker-range-start');
        const endDate = document.getElementById('datepicker-range-end');
        
        // Event listener untuk datepicker start
        startDate.addEventListener('changeDate', function() {
            const roomForms = document.querySelectorAll('form');
            roomForms.forEach(form => {
                const checkInInput = form.querySelector('[name="check_in_date"]');
                if (checkInInput) {
                    checkInInput.value = startDate.value;
                }
            });
        });

        // Event listener untuk input start (fallback)
        startDate.addEventListener('input', function() {
            const roomForms = document.querySelectorAll('form');
            roomForms.forEach(form => {
                const checkInInput = form.querySelector('[name="check_in_date"]');
                if (checkInInput) {
                    checkInInput.value = startDate.value;
                }
            });
        });
        
        // Event listener untuk datepicker end
        endDate.addEventListener('changeDate', function() {
            const roomForms = document.querySelectorAll('form');
            roomForms.forEach(form => {
                const checkOutInput = form.querySelector('[name="check_out_date"]');
                if (checkOutInput) {
                    checkOutInput.value = endDate.value;
                }
            });
        });

        // Event listener untuk input end (fallback)
        endDate.addEventListener('input', function() {
            const roomForms = document.querySelectorAll('form');
            roomForms.forEach(form => {
                const checkOutInput = form.querySelector('[name="check_out_date"]');
                if (checkOutInput) {
                    checkOutInput.value = endDate.value;
                }
            });
        });

        // Tambahkan validasi form submit
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const checkIn = form.querySelector('[name="check_in_date"]').value;
                const checkOut = form.querySelector('[name="check_out_date"]').value;
                
                if (!checkIn || !checkOut) {
                    e.preventDefault();
                    alert('Please select check-in and check-out dates first');
                }
            });
        });
    });
</script>
</x-app-layout>