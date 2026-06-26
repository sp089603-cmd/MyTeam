<nav class="bg-white shadow-sm mb-6">
    <div class="w-full px-6 py-3 flex justify-between items-center">
        <div class="flex items-center gap-8">
            <span class="font-bold text-lg text-blue-600 tracking-wide">MyTeam</span>

            <div class="flex gap-5 text-sm font-medium">

                {{-- menu products --}}
                <a href="{{ route('products.index') }}"
                    class="{{ request()->routeIs('products.index')
                        ? 'text-blue-500 border-b-2 border-blue-500 pb-1'
                        : 'text-gray-500 hover:text-blue-500' }}">
                    <span class="material-icons text-base">inventory</span>
                    Item
                </a>

                {{-- menu Transaksi --}}
                <a href="{{ route('transactions.index') }}"
                    class="{{ request()->routeIs('transactions.index')
                        ? 'text-blue-500 border-b-2 border-blue-500 pb-1'
                        : 'text-gray-500 hover:text-blue-500' }}">
                    <span class="material-icons text-base">receipt_long</span>
                    Transaksi
                </a>
                  {{-- menu History --}}
                <a href="{{ route('transactions.history') }}"
                    class="{{ request()->routeIs('transactions.history')
                        ? 'text-blue-500 border-b-2 border-blue-500 pb-1'
                        : 'text-gray-500 hover:text-blue-500' }}">
                    <span class="material-icons text-base">history</span>
                    Riwayat
                </a>

            </div>
        </div>

        {{-- logout --}}
        <form action="{{ route('logout') }}" method="post" class="m-0">
            @csrf
            <button type="submit"
                class="text-gray-500 hover:text-red-500 font-medium flex items-center gap-1 transition">
                <span class="material-icons text-base">logout</span>
                Keluar
            </button>
        </form>
    </div>
</nav>