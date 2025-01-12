<x-app-layout>
    <section class="h-screen w-full overflow-hidden lg:p-2 text-gray-100">
        <div class="h-full w-full bg-hero-pattern bg-cover bg-center lg:rounded-lg overflow-hidden">
            <div class="h-full w-full bg-black/65 px-8 lg:px-16 flex flex-col justify-center items-start">
                <div class="max-w-md flex flex-col justify-center items-start gap-6">
                    <div class="flex items-center justify-center font-semibold rounded-full text-sm bg-white p-2 gap-2 text-gray-900">
                        <img src={{ asset('images/crown.png') }} class="w-5" alt="">
                        <p>ASEAN Green Hotel Award 2024</p>
                    </div>
                    <h1 class="text-4xl font-black">The Best Luxury Hotel in the World</h1>
                    <p class="text-lg">Enjoy the comfort and beauty we offer, from modern facilities to exceptional service that caters to your every need.</p>
                    <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-semibold text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Book Now</button>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>