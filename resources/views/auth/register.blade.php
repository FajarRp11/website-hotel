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

        <form method="POST" action="{{ route('register') }}" class="mb-4">
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
            <x-input-error :messages="$errors->get('name')" class="my-2 text-xs" />

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
            <x-input-error :messages="$errors->get('email')" class="my-2 text-xs" />

            <!-- Password -->
            <div class="mb-4">
                <div class="relative">
                    <x-input-group
                        type="password"
                        name="password"
                        id="password"
                        label="Password"
                        required
                        autocomplete="off"
                    />
                    <button type="button" onclick="togglePassword('password')" class="absolute right-2 top-3 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-500">* Password minimal 8 karakter</p>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <div class="relative">
                    <x-input-group
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        label="Confirm Password"
                        required
                        autocomplete="off"
                    />
                    <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-2 top-3 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-gray-500">* Pastikan password yang dimasukkan sama</p>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-xs" />
            </div>
            <x-primary-button>
                {{ __('Create account') }}
            </x-primary-button>
        </form>
        <a href="{{ route('login') }}" class="underline text-sm text-center text-gray-600">Have an account? <span class="no-underline text-blue-700">Log in</span></a>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
