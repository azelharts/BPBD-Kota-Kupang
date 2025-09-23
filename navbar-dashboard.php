<!-- dashboard-navbar: Tailwind rewrite -->
<nav class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      <!-- Left: logo + brand -->
      <a href="index.php" class="flex items-center gap-x-4">
        <img src="image/bpbd.png" alt="BPBD" class="h-8 w-auto">
        <span class="text-xl font-black text-amber-400">BPBD KOTA KUPANG</span>
      </a>

      <!-- Mobile hamburger -->
      <div class="lg:hidden">
        <button id="dash-toggle" class="p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-400">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>

      <!-- Right: links + dropdown + search -->
      <div id="dash-menu" class="hidden lg:flex lg:items-center lg:space-x-6">
        <a href="dashboard.php" class="hover:text-amber-300 transition">Dashboard</a>

        <!-- Input Data dropdown -->
        <div class="relative">
          <button id="input-dropdown" class="flex items-center space-x-1 hover:text-amber-300 focus:outline-none">
            <span>Input/Update Data</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div id="input-menu" class="absolute right-0 mt-2 w-56 bg-white text-gray-900 rounded-md shadow-lg hidden">
            <a href="input-kejadian.php" class="block px-4 py-2 hover:bg-gray-100">Input Data Kejadian & Bencana</a>
            <div href="#" class="block px-4 py-2 bg-zinc-300 text-zinc-500 cursor-not-allowed">Input User Stakeholder</div>
            <a href="input-cuaca.php" class="block px-4 py-2 hover:bg-gray-100">Update Prakiraan Cuaca Wil. Perairan</a>
            <div href="#" class="block px-4 py-2 bg-zinc-300 text-zinc-500 cursor-not-allowed">Update Prakiraan Cuaca Wil. Pelayanan</div>
          </div>
        </div>

        <a href="logout.php" class="hover:text-amber-300 transition">Logout</a>

        <!-- Search -->
        <form class="flex items-center space-x-2" role="search">
          <input type="search" placeholder="Search" aria-label="Search"
                 class="px-3 py-1 rounded-md bg-white/10 border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400">
          <button type="submit" class="px-3 py-1 rounded-md bg-amber-500 hover:bg-amber-600 text-gray-900 font-semibold transition">
            Search
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="dash-mobile" class="lg:hidden hidden px-4 pb-4 space-y-2">
    <a href="dashboard.php" class="block hover:text-amber-300">Dashboard</a>

    <div>
      <span class="text-sm text-gray-400">Input Data:</span>
      <div class="mt-1 space-y-1 pl-2">
        <a href="input-kejadian.php" class="block hover:text-amber-300">Input Data Kejadian</a>
        <a href="#" class="block hover:text-amber-300">Input User Stakeholder</a>
        <a href="inputcuaca.php" class="block hover:text-amber-300">Update Cuaca Perairan</a>
        <a href="#" class="block hover:text-amber-300">Update Cuaca Pelayanan</a>
      </div>
    </div>

    <a href="logout.php" class="block hover:text-amber-300">Logout</a>

    <!-- mobile search -->
    <form class="flex space-x-2 pt-2" role="search">
      <input type="search" placeholder="Search" aria-label="Search"
             class="flex-1 px-3 py-1 rounded-md bg-white/10 border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400">
      <button type="submit" class="px-3 py-1 rounded-md bg-amber-500 hover:bg-amber-600 text-gray-900 font-semibold transition">
        Search
      </button>
    </form>
  </div>
</nav>

<!-- Tiny vanilla-js for toggles -->
<script>
  const dashToggle   = document.getElementById('dash-toggle');
  const dashMenu     = document.getElementById('dash-menu');
  const dashMobile   = document.getElementById('dash-mobile');
  const inputDropdown= document.getElementById('input-dropdown');
  const inputMenu    = document.getElementById('input-menu');

  dashToggle.addEventListener('click', () => dashMobile.classList.toggle('hidden'));

  inputDropdown.addEventListener('click', () => inputMenu.classList.toggle('hidden'));
  document.addEventListener('click', e => {
    if(!e.target.closest('#input-dropdown')) inputMenu.classList.add('hidden');
  });
</script>