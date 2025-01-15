<nav class="bg-white font-quicksand md:bg-transparent fixed w-full z-20 top-0 start-0 border-b border-gray-200 md:border-none">
    <div class="max-w-screen-md lg:max-w-screen-xl md:bg-white md:mt-4 md:rounded-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo Section -->
        <a href="/" class="flex items-center space-x-2 rtl:space-x-reverse">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-blue-700">
                <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
            </svg>
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Hotel</span>
        </a>

        <!-- Right Section (Desktop) -->
        <div class="hidden md:flex gap-2 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-gray-900 text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">{{ Auth::user()->name }} 
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-2xl w-40">
                    <ul class="py-2 text-gray-900" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="block ps-4 py-2 hover:bg-gray-100">Profile</a>
                        </li>
                        <li class="hover:bg-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-start ps-4 py-2">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class="text-white hidden md:flex justify-center items-center gap-2 bg-gray-900 font-medium rounded-full text-sm px-4 py-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-semibold">Login</span>
                </a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col md:p-0 font-medium md:space-x-8 rtl:space-x-reverse md:flex-row md:border-0 bg-white">
                
                <!-- Navigation Links -->
                <li>
                    <a href={{ route('home') }} class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:hover:text-blue-700">Home</a>
                </li>
                <li>
                    <a href={{ route('customer') }} class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:hover:text-blue-700">Booking</a>
                </li>

                <!-- User Links (Mobile) -->
                @auth
                    <div class="block md:hidden border-t border-b border-gray-200 my-2">
                        <div class="px-3 py-3 flex flex-col gap-2">
                            <div>
                                <p class="text-gray-900">{{ Auth::user()->name }}</p>
                                <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="block mt-2 text-gray-900">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                @csrf
                                <button type="submit" class="w-full text-start text-gray-900">Log Out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <li class="block md:hidden border-t border-b border-gray-200 my-2 py-3">
                        <a href="/login" class="text-white flex justify-center items-center gap-2 w-fit bg-gray-900 font-medium rounded-full text-sm px-4 py-2 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-semibold">Login</span>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>