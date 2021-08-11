<header>
  <nav
    class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
      <a href="{{ route('home') }}"
        class="text-2xl no-underline text-grey-darkest hover:text-blue-600 transition-all">Home</a>
    </div>
    <div class="flex justify-center">
      <a href="{{ route('home') }}"
        class="text-lg no-underline text-grey-darkest hover:text-blue-600 transition-all ml-2">Transações</a>
      <button id="btn-cart"
        class="flex items-center text-lg no-underline text-grey-darkest hover:text-blue-600 transition-all ml-2 relative">
        <span class="cart-quantity bg-blue-600">{{ session('itemsTotal') ?? '0' }}</span>
        Carrinho
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path
            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
        </svg>
      </button>
    </div>
  </nav>
</header>