<nav class="bg-white font-quicksand md:bg-transparent fixed w-full z-20 top-0 start-0 border-b border-gray-200 md:border-none">
    <div class="max-w-screen-md lg:max-w-screen-xl md:bg-white md:mt-4 md:rounded-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo Section -->
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Flowbite</span>
        </a>

        <!-- Right Section (Sign In & Toggle Button) -->
        <div class="flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="/login" class="text-white hidden md:flex justify-center items-center gap-2 bg-gray-900 font-medium rounded-full text-sm px-4 py-2 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-semibold">Sign In</span>
            </a>
            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Navbar Links -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white text-gray-900">
                
                <li>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:hover:text-blue-700">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:hover:text-blue-700">Blog</a>
                </li>
                <!-- Sign In for Mobile -->
                <li class="block md:hidden">
                    <a href="/login" class="text-white flex justify-center items-center gap-2 w-fit bg-gray-900 font-medium rounded-full text-sm px-4 py-2 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold">Sign In</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
