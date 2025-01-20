<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">My Bookings</h2>
            <a href="{{ route('booking') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Book New Room
            </a>
        </div>

        <!-- Content -->
        @if($bookings->isEmpty())
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <div class="mb-4">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <p class="text-gray-600 mb-4">You haven't made any bookings yet.</p>
                <a href="{{ route('booking.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Book a Room Now
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($bookings as $booking)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-4">
                        <div class="flex justify-between items-start">
                            <div class="text-white">
                                <h3 class="font-bold text-lg">Room {{ $booking->room->room_number }}</h3>
                                <p class="text-sm opacity-90">Booking #{{ $booking->booking_number }}</p>
                            </div>
                            <div class="bg-white/20 px-3 py-1 rounded-full">
                                <span class="text-white text-sm">
                                    {{ $booking->status === 'pending' ? '⏳' : ($booking->status === 'success' ? '✓' : '×') }}
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Price -->
                        <div class="mb-6">
                            <p class="text-sm text-gray-600">Total Cost</p>
                            <p class="text-2xl font-bold text-green-600">
                                Rp. {{ number_format($booking->total_cost, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Dates -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Check In</p>
                                <p class="font-semibold">{{ $booking->check_in_date->format('d M Y') }}</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-600 mb-1">Check Out</p>
                                <p class="font-semibold">{{ $booking->check_out_date->format('d M Y') }}</p>
                            </div>
                        </div>

                        <!-- Booking Details -->
                        <div class="space-y-2 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Duration</span>
                                <span class="font-medium">
                                    {{ $booking->check_in_date->diffInDays($booking->check_out_date) }} nights
                                </span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Room Type</span>
                                <span class="font-medium">{{ $booking->room->room_type }}</span>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex gap-3">
                            @if($booking->status === 'pending')
                                <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="flex-1">
                                    @csrf
                                    <button type="button" 
                                            onclick="openCancelModal('{{ $booking->booking_number }}')"
                                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 py-2.5 px-4 rounded-lg text-sm font-medium transition-colors duration-200">
                                        Cancel Booking
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <!-- Pagination -->
            <div class="mt-8">
                {{ $bookings->links() }}
            </div> --}}
        @endif
    </div>

    <!-- Cancel Modal -->
    <div id="cancelModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <h3 class="text-xl font-bold mb-4">Cancel Booking</h3>
            <p class="text-gray-600 mb-6">
                Are you sure you want to cancel booking <span id="bookingNumber" class="font-medium"></span>? 
                This action cannot be undone.
            </p>
            <div class="flex gap-4">
                <button onclick="closeCancelModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200">
                    No, Keep It
                </button>
                <button onclick="submitCancel()" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200">
                    Yes, Cancel Booking
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let currentForm = null;

        function openCancelModal(bookingNumber) {
            currentForm = event.target.closest('form');
            document.getElementById('bookingNumber').textContent = bookingNumber;
            document.getElementById('cancelModal').classList.remove('hidden');
            document.getElementById('cancelModal').classList.add('flex');
        }

        function closeCancelModal() {
            document.getElementById('cancelModal').classList.add('hidden');
            document.getElementById('cancelModal').classList.remove('flex');
            currentForm = null;
        }

        function submitCancel() {
            if (currentForm) {
                currentForm.submit();
            }
        }

        // Close modal when clicking outside
        document.getElementById('cancelModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeCancelModal();
            }
        });
    </script>
</x-app-layout>