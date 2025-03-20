<x-app-layout>
    <div class="h-screen px-4 pt-28 bg-gradient-to-br from-blue-50 to-indigo-100 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Form Card with Shadow -->
            <div class="overflow-hidden bg-white rounded-2xl shadow-xl">
                <!-- Header with Gradient Background -->
                <div class="px-6 py-8 bg-gradient-to-r from-blue-600 to-indigo-700 sm:px-10">
                    <div class="text-center">
                        <h2 class="text-3xl font-extrabold text-white">Complete Your Profile</h2>
                        <p class="mt-2 text-lg text-blue-100">Lengkapi informasi kontak Anda untuk melanjutkan</p>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="px-6 py-4 sm:px-10">
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        
                        <!-- Hidden User ID -->
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <!-- Two Column Layout -->
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <!-- Name -->
                            <div class="transition duration-300 transform hover:scale-[1.01]">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <div class="mt-1 relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="name" id="name" 
                                        class="pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm bg-gray-50"
                                        value="{{ Auth::user()->name }}"
                                        required
                                        readonly>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="transition duration-300 transform hover:scale-[1.01]">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1 relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                    </div>
                                    <input type="text" name="email" id="email" 
                                        class="pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm bg-gray-50"
                                        value="{{ Auth::user()->email }}"
                                        required
                                        readonly>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="transition duration-300 transform hover:scale-[1.01]">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <div class="mt-1 relative rounded-lg shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                    </div>
                                    <input type="tel" name="phone_number" id="phone_number" 
                                        class="pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                        placeholder="Masukkan nomor telepon Anda"
                                        value="{{ old('phone_number', $customer->phone_number ?? '') }}"
                                        required>
                                </div>
                                @error('phone_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="transition duration-300 transform hover:scale-[1.01]">
                                <label for="address" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <div class="mt-1 relative rounded-lg shadow-sm">
                                    <div class="absolute top-3 left-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                    </div>
                                    <textarea name="address" id="address" rows="4" 
                                        class="pl-10 block w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                                        placeholder="Masukkan alamat lengkap Anda"
                                        required>{{ old('address', $customer->address ?? '') }}</textarea>
                                </div>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-6 mt-6">
                            <button type="submit" 
                                class="w-full flex justify-center items-center px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-md font-bold rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Simpan Informasi
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Bottom Info Section -->
                <div class="px-6 py-4 bg-gray-50 sm:px-10">
                    <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Informasi Anda terjamin keamanannya</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>