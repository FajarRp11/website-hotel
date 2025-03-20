<x-app-layout>

    <!-- Success Registration Alert -->
    <div id="success-alert" class="fixed hidden bottom-6 right-[25rem] w-full max-w-sm bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all duration-500 ease-out z-50 border-l-4 border-green-500">
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3 w-0 flex-1">
                    <p class="text-sm font-medium text-gray-900">
                        Registration successful!
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                        Welcome to our luxury hotel. Your account has been created successfully.
                    </p>
                    <div class="mt-3 flex">
                        <a href="{{ route('profile.edit') }}" class="bg-green-50 px-3 py-1.5 text-sm font-medium text-green-600 hover:bg-green-100 rounded-lg transition-colors">
                            View Profile
                        </a>
                    </div>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button id="close-alert" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 transition-colors">
                        <span class="sr-only">Close</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Progress bar untuk auto-dismiss -->
        <div class="h-1 bg-green-100">
            <div class="h-full bg-green-500 animate-progress"></div>
        </div>
    </div>

    <!-- Hero Section with Parallax Effect -->
    <section class="relative w-full overflow-hidden">
        <!-- Parallax Background with Overlay -->
        <div class="absolute inset-0 bg-hero-pattern bg-cover bg-center bg-fixed transform transition-transform duration-1000">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 to-black/50"></div>
        </div>
        
        <!-- Content -->
        <div class="relative min-h-screen md:h-full w-full overflow-hidden px-8 lg:px-24 flex flex-col justify-center">
            <div class="max-w-xl" data-aos="fade-up" data-aos-duration="1000">
                <div class="inline-flex items-center justify-center font-medium rounded-full text-sm bg-white/90 p-2.5 px-5 gap-2 text-gray-900 mb-6 shadow-lg transform hover:scale-105 transition-all">
                    <img src={{ asset('images/crown.png') }} class="w-5" alt="Award icon">
                    <p>ASEAN Green Hotel Award 2024</p>
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 leading-tight">Luxury Redefined</h1>
                <p class="text-xl text-gray-100 mb-8 leading-relaxed">Discover unparalleled comfort and elegance at Bali's premier luxury destination, where every detail exceeds expectations.</p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="button" class="px-8 py-3.5 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300 shadow-lg hover:shadow-blue-500/30">
                        Book Now
                    </button>
                    <button type="button" class="px-8 py-3.5 text-base font-semibold text-gray-900 bg-white/90 rounded-lg hover:bg-white transition-all duration-300 shadow-lg">
                        View Rooms
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 px-8 lg:px-24 bg-white">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1" data-aos="fade-right" data-aos-duration="1000">
                    <h2 class="text-3xl font-bold mb-2 text-gray-900">About Our Hotel</h2>
                    <div class="w-20 h-1 bg-blue-600 mb-8"></div>
                    <div class="space-y-6 text-gray-700">
                        <p class="text-lg">
                            Welcome to our luxury hotel, where elegance meets comfort in the heart of Bali. Our strategically located property offers the perfect blend of modern amenities and warm hospitality.
                        </p>
                        <p class="text-lg">
                            Our rooms and suites are thoughtfully designed to create a serene retreat, featuring premium bedding, high-speed Wi-Fi, and breathtaking views of Bali's stunning landscapes.
                        </p>
                        <p class="text-lg">
                            Experience world-class amenities including our infinity rooftop pool overlooking the ocean, award-winning restaurants serving both local and international cuisine, and a rejuvenating spa offering traditional Balinese treatments.
                        </p>
                    </div>
                    <button type="button" class="mt-8 px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300">
                        Learn More
                    </button>
                </div>
                <div class="order-1 md:order-2" data-aos="fade-left" data-aos-duration="1000">
                    <div class="relative">
                        <img src="{{ asset('images/1.jpg') }}" class="w-full h-auto rounded-lg shadow-2xl" alt="hotel">
                        <div class="absolute -bottom-4 -right-4 bg-blue-600 text-white p-6 rounded-lg shadow-xl">
                            <p class="text-2xl font-bold">15+</p>
                            <p class="text-sm">Years of Excellence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Showcase Section -->
    <section class="md:py-8 py-12 px-8 lg:px-24 bg-gray-50">
        <div class="container mx-auto">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Luxury Accommodations</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="max-w-2xl mx-auto text-gray-600 text-lg">Experience unparalleled comfort in our meticulously designed rooms and suites, each offering a unique blend of luxury and Balinese charm.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Room Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="relative">
                        <img src="{{ asset('images/1.jpg') }}" class="w-full h-64 object-cover" alt="Deluxe Room">
                        <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Premium
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Deluxe Ocean View</h3>
                        <p class="text-gray-600 mb-4">Experience breathtaking ocean views from our spacious deluxe rooms.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Hot Water
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                High-Speed Wi-Fi
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Room Service
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-900 text-xl font-bold">$199<span class="text-sm text-gray-600 font-normal">/night</span></p>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Book Now</button>
                        </div>
                    </div>
                </div>
                
                <!-- Room Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="relative">
                        <img src="{{ asset('images/1.jpg') }}" class="w-full h-64 object-cover" alt="Executive Suite">
                        <div class="absolute top-4 right-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Luxury
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Executive Suite</h3>
                        <p class="text-gray-600 mb-4">Spacious suites with separate living areas and premium amenities.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Hot Water
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                High-Speed Wi-Fi
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Mini Bar
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-900 text-xl font-bold">$299<span class="text-sm text-gray-600 font-normal">/night</span></p>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Book Now</button>
                        </div>
                    </div>
                </div>
                
                <!-- Room Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition-transform duration-300 hover:shadow-2xl hover:-translate-y-2" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="relative">
                        <img src="{{ asset('images/1.jpg') }}" class="w-full h-64 object-cover" alt="Presidential Suite">
                        <div class="absolute top-4 right-4 bg-amber-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Elite
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Presidential Villa</h3>
                        <p class="text-gray-600 mb-4">Our most exclusive accommodation with private pool and butler service.</p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Private Pool
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Butler Service
                            </span>
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Ocean View
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-gray-900 text-xl font-bold">$499<span class="text-sm text-gray-600 font-normal">/night</span></p>
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href={{ route('customer') }} class="inline-flex items-center px-8 py-3.5 text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg hover:from-blue-700 hover:to-blue-900 transition-all duration-300 shadow-lg">
                    View All Rooms
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>