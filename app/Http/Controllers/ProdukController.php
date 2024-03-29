<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\Models\ProdukModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();

        return view('pages.produk.index', [
            'title' => 'Produk',
            'active' => 'Produk',
            'produk' => $produk,
        ]);
    }

    public function create()
    {
        return view('pages.produk.create', [
            'title' => 'Tambah Produk',
            'active' => 'Produk',
            'kategori' => KategoriModel::all(),
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_produk' => 'required|max:40',
            'merk' => 'required',
            'harga_beli' => 'required|integer',
            'diskon' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer'
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama budaya sudah ada. Harap pilih nama budaya yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $validatedData = $validator->validated();

            ProdukModel::create($validatedData);

            return redirect('/produk')->with('success', 'Data Produk Berhasil Ditambahkan.');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }


    public function edit($id)
    {
        return view('pages.produk.edit', [
            'title' => 'Edit Produk',
            'active' => 'produk',
            'produk' => ProdukModel::findOrFail($id),
            'kategori' => KategoriModel::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $produk = ProdukModel::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Data produk tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_produk' => 'required|max:40',
            'merk' => 'required',
            'harga_beli' => 'required|integer',
            'diskon' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer'
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
            ],
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus memiliki format: :values.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
            'unique' => 'Nama produk sudah ada. Harap pilih nama produk yang lain.',
        ]);

        try {
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            $validatedData = $validator->validated();

            $produk->update($validatedData);

            return redirect('/produk')->with('success', 'Data produk Berhasil Diperbarui!');
        } catch (ValidationException $e) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->errors()], 422);
            }

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Gagal menyimpan data. Silakan coba lagi.'], 500);
            }

            return redirect()->back()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    public function destroy(int $id)
    {
        $produk = ProdukModel::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    public function updateStok(Request $request)
    {
        // // Validasi request
        // $validator = Validator::make($request->all(), [
        //     'id_produk' => 'required|exists:produk,id_produk',
        //     'qty' => 'required|integer|min:1',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 422);
        // }

        // Ambil data yang diperlukan dari request
        $id_produk = $request->input('id_produk');
        $qty = $request->input('qty');

        try {
            // Lakukan operasi pembaruan stok
            ProdukModel::updateStok($id_produk, $qty);

            return response()->json(['message' => 'Stok produk berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui stok produk', 'error' => $e->getMessage()], 500);
        }
    }
}
