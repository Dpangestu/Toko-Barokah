<?php

namespace App\Http\Controllers;


use App\Models\SuppilerModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = SuppilerModel::all();

        return view('pages.supplier.index', [
            'title' => 'Supplier',
            'supplier' => $supplier,
        ]);
    }

    public function create()
    {
        return view('pages.supplier.create', [
            'title' => 'Supplier',
        ]);
    }

    public function store(request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:40',
            'alamat' => 'required',
            'telepon' => 'required|integer'
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

            SuppilerModel::create($validatedData);

            return redirect('/supplier')->with('success', 'Data Supplier Berhasil Ditambahkan.');
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
        return view('pages.supplier.edit', [
            'title' => 'Edit supplier',
            'supplier' => SuppilerModel::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $supplier = SuppilerModel::find($id);

        if (!$supplier) {
            return redirect('/supplier')->with('error', 'Data Supplier tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:40',
            'alamat' => 'required',
            'telepon' => 'required|integer'
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

            $supplier->update($validatedData);

            return redirect('/supplier')->with('success', 'Data Supplier Berhasil Diperbarui!');
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
        $supplier = SuppilerModel::find($id);

        if (!$supplier) {
            return redirect()->back()->with('error', 'Supplier tidak ditemukan.');
        }

        $supplier->delete();

        return redirect()->back()->with('success', 'Supplier berhasil dihapus.');
    }


}
