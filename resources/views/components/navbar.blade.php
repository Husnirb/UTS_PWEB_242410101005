<nav class="bg-white shadow-sm border-b-4 border-pawOrange sticky top-0 z-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="flex items-center space-x-2 cursor-pointer group z-20">
                <div class="bg-pawOrange p-2 rounded-xl group-hover:rotate-12 transition-transform">
                    <i class="fa-solid fa-paw text-white text-xl"></i>
                </div>
                <span class="font-display font-bold text-2xl text-pawDarkBlue">PawMeal</span>
            </a>

            <div class="hidden md:flex space-x-8 absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="font-bold {{ request()->routeIs('dashboard') ? 'text-pawBlue border-b-2 border-pawBlue' : 'text-gray-500 hover:text-pawBlue' }} pb-1 transition-colors">Dashboard</a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="font-bold {{ request()->routeIs('pengelolaan') ? 'text-pawBlue border-b-2 border-pawBlue' : 'text-gray-500 hover:text-pawBlue' }} pb-1 transition-colors">Pengelolaan</a>
            </div>

            <div class="flex items-center space-x-4 z-20">
                <div class="relative" id="user-menu-container">
                    <button onclick="toggleDropdown('user-dropdown')" class="bg-blue-50 border border-blue-100 px-3 md:px-4 py-2 rounded-full flex items-center shadow-sm hover:bg-blue-100 transition focus:outline-none">
                        <i class="fa-solid fa-user text-pawBlue mr-2"></i>
                        <span class="font-bold text-pawBlue text-sm md:text-base max-w-[80px] md:max-w-none truncate">{{ $username }}</span>
                        <i class="fa-solid fa-chevron-down text-pawBlue text-xs ml-2"></i>
                    </button>

                    <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 overflow-hidden">
                        <a href="{{ route('profile', ['username' => $username]) }}" class="block px-4 py-3 text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-pawBlue transition"><i class="fa-regular fa-id-card mr-2"></i> Profil Saya</a>
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Keluar</a>
                    </div>
                </div>

                <button onclick="toggleDropdown('mobile-menu')" class="md:hidden text-pawDarkBlue focus:outline-none ml-2">
                    <i class="fa-solid fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden pb-4 pt-2 border-t border-gray-100">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="font-bold px-2 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-pawBlue' : 'text-gray-600 hover:bg-gray-50' }}">Dashboard</a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="font-bold px-2 py-2 rounded-lg {{ request()->routeIs('pengelolaan') ? 'bg-blue-50 text-pawBlue' : 'text-gray-600 hover:bg-gray-50' }}">Pengelolaan</a>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown(id) {
        document.getElementById(id).classList.toggle('hidden');
    }

    window.addEventListener('click', function(e) {
        const userContainer = document.getElementById('user-menu-container');
        if (userContainer && !userContainer.contains(e.target)) {
            const dropdown = document.getElementById('user-dropdown');
            if(dropdown) dropdown.classList.add('hidden');
        }
    });
</script>
