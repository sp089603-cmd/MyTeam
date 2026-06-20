<html>
    <head>
        <title>Laporan Product MyTeam</title>
        <style>
            body {
                font-size: 12px;
                color: blue;
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid coral;
                padding-bottom: 10px;
            }
            title {
                font-size: 18px;
                font-weight: bold;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th{
                background-color: #f2f2f2;
                font-weight: bold;
                border: 1px solid #ddd;
                padding: 8px;
            }
            td {
                border: 1px solid #ddd;
                padding: 8px;
            }
            .text-center {
                text-align: center;
            }

        </style>
    </head>
        <div class="header">
            <h2>Laporan Product MyTeam</h2>
            <p>dicetak secara otomatis oleh sistem </p>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $p)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $p->nama_barang }}</td>
                <td>Rp. {{ number_format($p->harga,0,',','.') }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

         
    </body>
</html>