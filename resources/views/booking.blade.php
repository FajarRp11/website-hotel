<x-app-layout>
    <section class="min-h-screen w-full pt-24 bg-gradient-to-br from-blue-50 to-indigo-50 py-16">
        <!-- Hero Section -->
        <div class="container mx-auto px-4 mb-12">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">Find Your Perfect Room</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Select your dates and discover our luxurious accommodations tailored to your needs</p>
            </div>
            
            <!-- Alert Messages -->
            <div class="max-w-3xl mx-auto mb-8">
                @if (session('success'))
                    <div class="flex items-center p-4 mb-4 bg-green-50 border-l-4 border-green-500 rounded-lg shadow-md animate-fade-in" role="alert">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium text-green-700">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="flex items-center p-4 mb-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-md animate-fade-in" role="alert">
                        <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <span class="font-medium text-red-700">Please check the following errors:</span>
                            <ul class="mt-1.5 ml-4 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Date Range Picker -->
            <div class="max-w-3xl mx-auto">
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Select Your Stay Dates</h2>
                    <div id="date-range-picker" date-rangepicker class="flex flex-col md:flex-row md:items-center gap-4">
                        <div class="relative flex-1">
                            <label for="datepicker-range-start" class="block text-sm font-medium text-gray-700 mb-1">Check-in Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition-all hover:border-indigo-300" 
                                    placeholder="Select check-in date">
                            </div>
                        </div>
                        
                        <div class="hidden md:flex items-center justify-center">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                </svg>
                            </span>
                        </div>
                        
                        <div class="relative flex-1">
                            <label for="datepicker-range-end" class="block text-sm font-medium text-gray-700 mb-1">Check-out Date</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-3 transition-all hover:border-indigo-300" 
                                    placeholder="Select check-out date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Room Cards -->
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Available Accommodations</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($rooms as $room)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group flex flex-col">
    <!-- Room Image with Overlay -->
    <div class="relative overflow-hidden">
        <img class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110" 
            src="{{ asset('storage/' . $room->image) }}" 
            alt="Room {{ $room->room_number }}" />
        <div class="absolute top-4 right-4 bg-indigo-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
            {{ ucfirst($room->room_type) }}
        </div>
    </div>
    
    <!-- Room Details -->
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Room {{ $room->room_number }}</h3>
            <div class="flex items-center">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="ml-1 text-gray-600 text-sm">4.9</span>
            </div>
        </div>
        
        <div class="mb-4">
            <div class="flex items-center mb-2">
                <span class="text-3xl font-extrabold text-indigo-600">Rp {{ number_format($room->price_per_night, 0, ',', '.') }}</span>
                <span class="text-gray-500 text-sm ml-2">/ malam</span>
            </div>
        </div>
        
        <!-- Facilities -->
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-600 mb-2">Facilities:</h4>
            <div class="grid grid-cols-2 gap-2">
                @forelse($room->facilities as $facility)
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('storage/' . $facility->image) }}" class="w-4 h-4" alt="{{ $facility->name }}">
                        <p class="text-gray-700 text-sm">{{ $facility->name }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">No facilities</p>
                @endforelse
            </div>
        </div>
        
        <!-- Booking Form -->
        <form action="{{ route('booking.store', $room->id) }}" method="POST" class="mt-auto">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <input type="hidden" name="check_in_date" id="check_in_date_{{ $room->id }}">
            <input type="hidden" name="check_out_date" id="check_out_date_{{ $room->id }}">
            <button type="submit" 
                class="w-full bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-700 hover:to-blue-600 text-white font-bold py-3 px-4 rounded-lg flex items-center justify-center transition-all duration-300 transform hover:scale-[1.02]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Book Now
            </button>
        </form>
    </div>
</div>
                @endforeach
            </div>
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