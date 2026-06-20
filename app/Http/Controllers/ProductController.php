<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tampilkan product:
        $products = \App\Models\product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //menyimpan data:
        $request->validate(
            [
                'nama_barang' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'nullable',
            ]
        );
        \App\Models\Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'barang berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update product:
         $request->validate(
            [
                'nama_barang' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'nullable',
            ]
        );
        //cari product berdasarkan id:
        $product = \App\Models\Product::findOrFail($id);
        //update:
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'barang berhasil di update.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data berdasarkan id:
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'barang berhasil di hapus.');
    }

    //fungsi download pdf
    public function downloadPdf()
    {
        //ambil semua data table products
        $products = \App\Models\Product::all();
        //muat halaman view khusus (html+css)dan gunakan data products
        $pdf = \PDF::loadView('products/product_pdf', compact('products'));
        return $pdf->download('Laporan-Data-Product-MyTeam.pdf');
    }
}
