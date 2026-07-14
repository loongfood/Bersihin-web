@props(['disabled' => false])
<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#D8DED8] focus:border-[#4C9A5B] focus:ring-[#4C9A5B] rounded-lg shadow-sm bg-white text-[#10241C] placeholder-gray-400']) }}>
