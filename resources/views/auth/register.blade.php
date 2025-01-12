<x-guest-layout>
    <div class="w-full h-fit flex justify-between flex-col sm:max-w-md px-12 py-4 bg-white shadow-md overflow-hidden rounded-lg">
        <div class="flex justify-center items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-blue-700">
                <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
            </svg>
            <h1 class="font-bold font-quicksand text-xl">hotel</h1>
        </div>
        
        <h1 class="text-3xl font-quicksand text-center font-semibold tracking-wider my-4">Create account</h1>

        <form method="POST" action="{{ route('login') }}" class="mb-4">
            @csrf
            <!-- Name -->
            <x-input-group
                type="name"
                name="name"
                id="name"
                label="Name"
                :value="old('name')"
                required
                autocomplete="off"
            />
            <x-input-error :messages="$errors->get('name')" class="my-2" />

            <!-- Email Address -->
            <x-input-group
                type="email"
                name="email"
                id="email"
                label="Email address"
                :value="old('email')"
                required
                autocomplete
            />
            <x-input-error :messages="$errors->get('email')" class="my-2" />

            <!-- Password -->
            <x-input-group
                type="password"
                name="password"
                id="password"
                label="Password"
                autocomplete="off"
                required
            />
            <x-input-error :messages="$errors->get('password')" class="my-2" />

            <!-- Confirm Password -->
            <x-input-group
                type="password"
                name="confirm_password"
                id="confirm_password"
                label="Confirm Password"
                required
                autocomplete="off"
            />
            <x-input-error :messages="$errors->get('email')" class="my-2" />
            <x-primary-button>
                {{ __('Create account') }}
            </x-primary-button>
        </form>
        <a href="{{ route('login') }}" class="underline text-sm text-center text-gray-600">Have an account? <span class="no-underline text-blue-700">Log in</span></a>
    </div>
</x-guest-layout>
