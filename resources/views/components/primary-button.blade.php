<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-center py-3 bg-blue-700 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
