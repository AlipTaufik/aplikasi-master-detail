<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request) : view
    {
        $page = $request->input('page', 1);
        $perPage = 10;
        $data['barang'] = BarangModel::orderBy('id','desc')->paginate($perPage);
        $total = BarangModel::count();
        $totalPages = ceil($total / $perPage);
        $data['totalpages']=$totalPages;
        return view('barang.index', $data);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $brg = BarangModel::where('nama_barang', 'LIKE', "%{$query}%")->limit(10)->get();
        return response()->json($brg);
    }

    public function create() : View
    {
        return view('barang.create');
    }


    public function store(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
          'kode_barang' => 'required',
          'nama_barang' => 'required',
          'harga' => 'required',
          'kategori' => 'required',
        ]);
        $barang = new BarangModel;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->kategori = $request->kategori;
        $barang->save();
        return redirect()->route('barang.index')
                         ->with('success','barang has been created successfully.');
    }

    public function show(BarangModel $barang) : view
    {
        return view('barang.show',compact('barang'));
    }


    public function edit(BarangModel $barang) : view
    {
        return view('barang.edit',compact('barang'));
    }


    public function update(Request $request, $id) : RedirectResponse
    {
        $request->validate([
          'kode_barang' => 'required',
          'nama_barang' => 'required',
          'harga' => 'required',
          'kategori' => 'required',
        ]);
        $barang = BarangModel::find($id);
        // Check if barang exists
        if (!$barang) {
            return redirect()->route('barang.index')
                            ->with('error', 'Barang not found');
        }
        $barang->kode_barang= $request->kode_barang;
        $barang->nama_barang= $request->nama_barang;
        $barang->harga= $request->harga;
        $barang->kategori= $request->kategori;
        $barang->save();

        return redirect()->route('barang.index')
                         ->with('success','barang Has Been updated successfully');
    }


    public function destroy(BarangModel $barang) : RedirectResponse
    {
        $barang->delete();
        return redirect()->route('barang.index')
                        ->with('success','barang has been deleted successfully');
    }
}
