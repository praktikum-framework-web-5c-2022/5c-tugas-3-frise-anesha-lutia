<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;


class MatakuliahController extends Controller
{
    public function index(Matakuliah $matakuliah)
    {
        $matakuliah = Matakuliah::get();
        return view( view: 'matakuliah.index', data:['matakuliah' => $matakuliah] );
    }

    public function create(){
        return view(view: 'matakuliah.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kode_mk' => 'required|max:10',
            'nama_mk' => 'required',
        ]);
        
        Matakuliah::create($request->all());
        return redirect()->route(route:'matakuliah.index')
        ->with(key: 'message', value: "Data Matakuliah {$validate['nama_mk']} berhasil ditambahkan");
        }

    public function show(Matakuliah $matakuliah)
    {
       return view('matakuliah.detail', [
        'matakuliah' => $matakuliah,
       ]);
    }

    public function edit($id){
    {
        $data = Matakuliah::find($id);
        return view(view: 'matakuliah.edit', data:['matakuliah' => $data]);
    }
       
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'kode_mk' => 'required|max:10',
            'nama_mk' => 'required',
        ]);

        $matakuliah = Matakuliah::find($id);
        $matakuliah->kode_mk = $request->input('kode_mk');
        $matakuliah->nama_mk = $request->input('nama_mk');
        $matakuliah->update();

        return redirect()->route(route:'matakuliah.index')
        ->with(key: 'message', value: "Data Matakuliah {$validate['nama_mk']} berhasil diperbaharui");
            
    }
 
    public function destroy($id)
    {
        $matakuliah = Matakuliah::find($id);
        return redirect()->route(route:'matakuliah.index')
        ->with(key: 'message', value: "Data Matakuliah{$matakuliah['nama']} berhasil dihapus!");
    }   
}