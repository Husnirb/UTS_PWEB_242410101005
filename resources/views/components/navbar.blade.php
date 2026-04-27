<nav class="bg-white shadow-sm border-b-4 border-pawOrange sticky top-0 z-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="flex items-center space-x-2 cursor-pointer group">
                <div class="bg-pawOrange p-2 rounded-xl group-hover:rotate-12 transition-transform">
                    <i class="fa-solid fa-paw text-white text-xl"></i>
                </div>
                <span class="font-display font-bold text-2xl text-pawDarkBlue">PawMeal</span>
            </a>

            <div class="hidden md:flex space-x-6">
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="font-bold {{ request()->routeIs('dashboard') ? 'text-pawBlue border-b-2 border-pawBlue' : 'text-gray-500 hover:text-pawBlue' }} pb-1 transition-colors">Dashboard</a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="font-bold {{ request()->routeIs('pengelolaan') ? 'text-pawBlue border-b-2 border-pawBlue' : 'text-gray-500 hover:text-pawBlue' }} pb-1 transition-colors">Pengelolaan</a>
                <a href="{{ route('profile', ['username' => $username]) }}" class="font-bold {{ request()->routeIs('profile') ? 'text-pawBlue border-b-2 border-pawBlue' : 'text-gray-500 hover:text-pawBlue' }} pb-1 transition-colors">Profile</a>
            </div>

            <div class="relative">
                <button onclick="document.getElementById('user-dropdown').classList.toggle('hidden')" class="bg-blue-50 border border-blue-100 px-4 py-2 rounded-full flex items-center shadow-sm hover:bg-blue-100 transition focus:outline-none">
                    <i class="fa-solid fa-user text-pawBlue mr-2"></i>
                    <span class="font-bold text-pawBlue">{{ $username }}</span>
                    <i class="fa-solid fa-chevron-down text-pawBlue text-xs ml-2"></i>
                </button>

                <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 overflow-hidden">
                    <a href="{{ route('profile', ['username' => $username]) }}" class="block px-4 py-3 text-sm font-bold text-gray-700 hover:bg-blue-50 hover:text-pawBlue transition"><i class="fa-regular fa-id-card mr-2"></i> Profil Saya</a>
                    <div class="border-t border-gray-100"></div>
                    <a href="{{ route('login') }}" class="block px-4 py-3 text-sm font-bold text-red-500 hover:bg-red-50 transition"><i class="fa-solid fa-arrow-right-from-bracket mr-2"></i> Keluar</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('click', function(e) {
        if (!document.querySelector('.relative').contains(e.target)) {
            document.getElementById('user-dropdown').classList.add('hidden');
        }
    });
</script>
