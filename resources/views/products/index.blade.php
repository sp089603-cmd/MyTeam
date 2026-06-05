<html>
    <head>
        <title>Tabel Item</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body class="p-4">
        <h1 class="text-2xl font-bold mb-5">Tabel Item MyTeam</h1>
        <button onclick="toggle_model()" class="bg-blue-500 text-white px-4 py-2 rounded-2xl">+ Tambah Item</button>
        <table class="table-auto w-full mt-5">
            <thead>
            <tr class="bg-gray-300">
                <th class="border p-2">Nama Item</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Stok</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td class="border p-2">{{ $p->nama_barang }}</td>
                    <td class="border p-2">Rp. {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="border p-2">{{ $p->stok }}</td>
                    <td class="border p-2">{{ $p->deskripsi }}</td>
                    <td class="border p-2 text-center">
                        <div class="flex items-center justify-center gap-4">
                            <button onclick="toggle_edit({{ $p }})" class="text-green-500 font-medium">
                                <span class="material-icons">edit</span>
                            </button>
                            <button onclick="if(confirm('Yakin ingin menghapus item ini?')) { document.getElementById('form-delete{{ $p->id }}').submit(); }" class="text-red-600 font-medium">
                                <span class="material-icons">delete</span>
                            </button>
                            <form id="form-delete{{ $p->id }}" action="{{ route('products.destroy', $p->id) }}" method="post" class="hidden"></form>
                            @csrf
                            @method('DELETE')
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{-- modals tambah: --}}
        <div id="modal-tambah-item" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Tambah Item Baru</h2>
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <label for="nama barang" class="text-sm">Nama Barang</label>
                    <input type="text" name="nama_barang" class="w-full border p-2 mb-3" rounded" required>
                    <label for="harga" class="text-sm">Harga</label>
                    <input type="number" name="harga" class="w-full border p-2 mb-3" rounded" required>
                    <label for="stok" class="text-sm">Stok</label>
                    <input type="number" name="stok" class="w-full border p-2 mb-3" rounded" required>
                    <label for="deskripsi" class="text-sm">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border p-2 mb-3" rounded" required></textarea>
                    <div class="flex justify-end gap-3 mt-2">
                        <button type="button" onclick="toggle_model()" class="bg-gray-500">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-2xl">Simpan</button>
                    </div>
                </form>
            </div>
              {{-- modals edit: --}}
        <div id="modal-edit-item" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Edit Item</h2>
                <form action="form-edit" method="post">
                    @csrf
                    @method('PUT')
                    <label for="nama barang" class="text-sm">Nama Barang</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="w-full border p-2 mb-3" rounded" required>
                    <label for="harga" class="text-sm">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full border p-2 mb-3" rounded" required>
                    <label for="stok" class="text-sm">Stok</label>
                    <input type="number" id="stok" name="stok" class="w-full border p-2 mb-3" rounded" required>
                    <label for="deskripsi" class="text-sm">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="w-full border p-2 mb-3" rounded" required></textarea>
                    <div class="flex justify-end gap-3 mt-2">
                        <button type="button" onclick="document.getElementById('modal-tambah-item').classList.replace('flex', 'hidden')" class="bg-gray-500">Batal</button>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-2xl">Update</button>
                    </div>
                </form>
            </div>


        </div>
        <script>
            function toggle_model() {
                const modal = document.getElementById('modal-tambah-item');
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }
            function toggle_edit(){
                const modal = document.getElementById('modal-edit-item');
                //mengatur route pada action form secara dinamis
                document.getElementById('form-edit').action = '/products/' + item.id;
                //mengisi value input form dengan data item yang di pilih
                document.getElementById('nama_barang').value = item.nama_barang;
                document.getElementById('harga').value = item.harga;
                document.getElementById('stok').value = item.stok;
                document.getElementById('deskripsi').value = item.deskripsi;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        </script>
    </body>
</html>