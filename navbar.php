<nav class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      <!-- Left: logos + brand -->
      <a href="index.php" class="flex items-center gap-x-4">
        <img src="images/assets/logo-bpbd.png" alt="BPBD" class="h-8 w-auto">
        <span class="text-xl font-black text-amber-400">BPBD KOTA KUPANG</span>
      </a>

      <!-- Mobile hamburger -->
      <div class="lg:hidden">
        <button id="nav-toggle" class="p-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-400">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>

      <!-- Right: links + dropdown -->
      <div id="nav-menu" class="hidden lg:flex lg:items-center lg:space-x-6">
        <a href="index.php"   class="hover:text-amber-300 transition">Home</a>
        <a href="kontak.php" class="hover:text-amber-300 transition">Kontak</a>
        <a href="tentang.php"class="hover:text-amber-300 transition">Tentang</a>

        <!-- Login dropdown -->
        <div class="relative">
          <button id="dropdown-toggle" class="flex items-center space-x-1 hover:text-amber-300 focus:outline-none">
            <span>Login</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>

          <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded-md shadow-lg hidden">
            <a href="login-administrator.php"  class="block px-4 py-2 hover:bg-gray-100">Administrator</a>
            <a href="login-stakeholder.php" class="block px-4 py-2 hover:bg-gray-100">Stakeholder</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="lg:hidden hidden px-4 pb-4 space-y-2">
    <a href="index.php" class="block hover:text-amber-300">Home</a>
    <a href="kontak.php" class="block hover:text-amber-300">Contact</a>
    <a href="tentang.php"class="block hover:text-amber-300">About</a>
    <div class="pt-2 border-t border-gray-700">
      <span class="text-sm text-gray-400">Login as:</span>
      <div class="mt-2 space-y-1">
        <a href="login-administrator.php"  class="block hover:text-amber-300">Administrator</a>
        <a href="login-stakeholder.php" class="block hover:text-amber-300">Stakeholder</a>
      </div>
    </div>
  </div>
</nav>

<!-- Tiny vanilla-js for toggle (no extra deps) -->
<script>
  const navToggle = document.getElementById('nav-toggle');
  const navMenu   = document.getElementById('nav-menu');
  const mobileMenu= document.getElementById('mobile-menu');
  const ddToggle  = document.getElementById('dropdown-toggle');
  const ddMenu    = document.getElementById('dropdown-menu');

  navToggle.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));

  ddToggle.addEventListener('click', () => ddMenu.classList.toggle('hidden'));
  document.addEventListener('click', e => {
    if(!e.target.closest('#dropdown-toggle')) ddMenu.classList.add('hidden');
  });
</script>