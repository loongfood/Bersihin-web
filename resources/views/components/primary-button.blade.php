<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-5 py-2.5 bg-[#4C9A5B] border border-transparent rounded-md font-semibold text-xs text-[#F4F4EC] uppercase tracking-widest hover:bg-[#3f8049] focus:bg-[#3f8049] active:bg-[#2e6038] focus:outline-none focus:ring-2 focus:ring-[#4C9A5B] focus:ring-offset-2 focus:ring-offset-[#10241C] transition ease-in-out duration-150 shadow-sm hover:shadow-md']) }}>
    {{ $slot }}
</button>
