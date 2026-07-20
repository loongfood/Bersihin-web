<nav x-data="{ open: false }" class="relative bg-[#10241C] border-b border-[#1C3A2C]">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <svg class="w-7 h-7 text-[#4C9A5B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 3.75H6.912a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H15M9 3.75V9m6-5.25V9m-6 0h6" />
                        </svg>
                        <span class="text-[#F4F4EC]" style="font-family: 'Fraunces', serif; font-weight: 600;">Bersihin</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-1.5 px-1 pt-1 text-sm font-medium border-b-2 transition
                    {{ request()->routeIs('dashboard')
                            ? 'border-[#4C9A5B] text-[#F4F4EC]'
                            : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:border-[#4C9A5B]/50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12l1.5-1.5m0 0l7.5-7.5 7.5 7.5m-15 0l1.5 1.5m0 0l7.5 7.5 7.5-7.5m-15 0V9.75a1.5 1.5 0 011.5-1.5h1.5a1.5 1.5 0 011.5 1.5v9.75M8.25 21h7.5" />
                        </svg>
                        {{ __('Dashboard') }}
                    </a>

                    @if(Auth::user()->hasRole('admin'))
                    <a href="{{ route('kategori-sampah.index') }}"
                    class="inline-flex items-center gap-1.5 px-1 pt-1 text-sm font-medium border-b-2 transition
                    {{ request()->routeIs('kategori-sampah.*')
                            ? 'border-[#4C9A5B] text-[#F4F4EC]'
                            : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:border-[#4C9A5B]/50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        Kategori Sampah
                    </a>

                    <a href="{{ route('jadwal-pengangkutan.index') }}"
                    class="inline-flex items-center gap-1.5 px-1 pt-1 text-sm font-medium border-b-2 transition
                    {{ request()->routeIs('jadwal-pengangkutan.*')
                            ? 'border-[#4C9A5B] text-[#F4F4EC]'
                            : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:border-[#4C9A5B]/50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        Jadwal Pengangkutan
                    </a>
                    @endif

                    <a href="{{ route('laporan.index') }}"
                    class="inline-flex items-center gap-1.5 px-1 pt-1 text-sm font-medium border-b-2 transition
                    {{ request()->routeIs('laporan.*')
                            ? 'border-[#4C9A5B] text-[#F4F4EC]'
                            : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:border-[#4C9A5B]/50' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Laporan
                    </a>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="ms-auto -me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#9CB5A8] hover:text-[#F4F4EC] hover:bg-white/5 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Settings Dropdown - mepet ujung kanan browser -->
    <div class="hidden sm:flex sm:items-center absolute right-4 sm:right-6 lg:right-8 top-0 h-16">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="inline-flex items-center gap-2 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-[#9CB5A8] hover:text-[#F4F4EC] focus:outline-none transition ease-in-out duration-150">
                    <div class="w-7 h-7 rounded-full bg-[#4C9A5B] flex items-center justify-center text-white text-xs font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#10241C]">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}"
            class="flex items-center gap-2 pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
            {{ request()->routeIs('dashboard')
                    ? 'border-[#4C9A5B] text-[#F4F4EC] bg-white/5'
                    : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12l1.5-1.5m0 0l7.5-7.5 7.5 7.5m-15 0l1.5 1.5m0 0l7.5 7.5 7.5-7.5m-15 0V9.75a1.5 1.5 0 011.5-1.5h1.5a1.5 1.5 0 011.5 1.5v9.75M8.25 21h7.5" />
                </svg>
                {{ __('Dashboard') }}
            </a>

            @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('kategori-sampah.index') }}"
            class="flex items-center gap-2 pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
            {{ request()->routeIs('kategori-sampah.*')
                    ? 'border-[#4C9A5B] text-[#F4F4EC] bg-white/5'
                    : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                </svg>
                Kategori Sampah
            </a>

            <a href="{{ route('jadwal-pengangkutan.index') }}"
            class="flex items-center gap-2 pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
            {{ request()->routeIs('jadwal-pengangkutan.*')
                    ? 'border-[#4C9A5B] text-[#F4F4EC] bg-white/5'
                    : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                </svg>
                Jadwal Pengangkutan
            </a>
            @endif

            <a href="{{ route('laporan.index') }}"
            class="flex items-center gap-2 pl-3 pr-4 py-2 border-l-4 text-base font-medium transition
            {{ request()->routeIs('laporan.*')
                    ? 'border-[#4C9A5B] text-[#F4F4EC] bg-white/5'
                    : 'border-transparent text-[#9CB5A8] hover:text-[#F4F4EC] hover:bg-white/5' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Laporan
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#1C3A2C]">
            <div class="flex items-center gap-3 px-4">
                <div class="w-9 h-9 rounded-full bg-[#4C9A5B] flex items-center justify-center text-white text-sm font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-base text-[#F4F4EC]">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-[#9CB5A8]">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
