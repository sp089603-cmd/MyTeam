```html
<html>
    <head>
        <title>Riwayat Transaksi</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body class="bg-gray-100">
        @include('navbar')
        <div class="max-w-6xl mx-auto bg-white rounded shadow-sm mt-6">
            <h2 class="text-xl font-bold mb-5 text-gray-800 flex items-center gap-2">
                <span class="material-icons text-blue-600">
                    history
                </span>
                Riwayat Transaksi Penjualan
            </h2>

            @if ($histories->isEmpty())
                <div class="bg-yellow-100 border-yellow-400 text-yellow-800 px-4 py-2 text-sm mb-4">
                    <span class="material-icons text-5xl mb-2">receipt_long</span>
                    <p class="font-medium">Belum ada riwayat transaksi.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-800">
                                <th class="p-4">Waktu Transaksi</th>
                                <th class="p-4">No Nota</th>
                                <th class="p-4">Daftar Item & QTY</th>
                                <th class="p-4">Total Pendapatan</th>
                            </tr>
                        </thead>

                        <tbody class="text-sm text-gray-700 divide-y">
                            @foreach ($histories as $h)
                                <tr>
                                    <td class="p-4 text-gray-600">
                                        {{ $h->created_at->format('d M Y - H:i') }} WIB
                                    </td>

                                    <td class="p-4 text-gray-600">
                                        {{ $h->no_nota }}
                                    </td>

                                    <td class="p-4">
                                        @foreach ($h->details as $detail)
                                            <div class="bg-amber-100 text-blue-800 px-2 py-1 rounded">
                                                {{ $detail->product->nama_barang ?? 'Produk Dihapus' }}
                                                <span class="text-blue-600 font-bold">{{ $detail->qty }}</span>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td class="p-4">
                                        Rp. {{ number_format($h->total_harga, 0, ',', ',') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </body>
</html>
```
