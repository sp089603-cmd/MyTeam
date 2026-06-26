<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\transaction_detail;
use App\Models\transactionDetail;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    // tampilan form transaksi pada index
    public function index()
    {
        $products = product::where([['stok', '>', 0]])->get();
        return view('transactions.index', compact('products'));
    }
    public function history(){
        $histories = transaction::with('details.product')->latest()->get();
        return view('transactions.history', compact('histories'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'product_id' => 'required|exists:products,id',
                'qty' => 'required|integer|min:1',
            ]
        );

        //ambil produk dengan id yang dipilih:
        $product = product::find($request->product_id);

        //cek apakah stok mencukupi
        //jika tidak kirim pesann (qty error)
        if ($stock = $product->stok < $request->qty) {
            return back()->withErrors(['qty_error' => 'Stok tidak mencukupi']);
        }

        //eksekusi simpan transaksi menggunakan DB:transaction
        DB::transaction(function () use ($request, $product) {
            //create data transaksi (tabel transactions)
            $subtotal = $product->harga * $request->qty;
            $no_nota = 'TRX - '. strtoupper(uniqid());

            $transaction = Transaction::create([
                'no_nota' => $no_nota,
                'total_harga' => $subtotal,
            ]);

            //create detail transaksi (tabel transaction_details)
            transaction_detail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'qty' => $request->qty,
                'harga_satuan' => $product->harga,
                'subtotal' => $subtotal,

            ]);

            //potong stok
            $product->decrement('stok', $request->qty);
            
        });

        //arahkan kembali ke halaman  form (dengan pesan sukses)
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan');
        
    }
}
