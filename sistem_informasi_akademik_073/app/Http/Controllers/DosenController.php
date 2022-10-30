<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Dosen;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller{
   
    public function index(Dosen $dosen)
    {
        $dosen = Dosen::get();
        return view( view: 'dosen.index', data:['dosen' => $dosen] );
    }

    public function create(){
        return view(view: 'dosen.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(rules:[
            'nidn' => 'required|max:25',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'photo' => 'require|file|image|max:2000',
        ]);
        dump(var: $validate);
        
        return redirect()->route(route:'dosen.index')
        ->with(key: 'message', value: "Data Dosen {$validate['nama']} berhasil ditambahkan");

        if($request->hasFile('photo')){
            $extFile = $request->photo->getClientOriginalExtension();
            $namaFile = 'dosen_'. time() . "." . $extFile;
            $path = $request->photo->storeAs('public',$namaFile);
            $newPath = asset('storage/'.$namaFile);
        }
        $dosen = new Dosen;
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jenis_kelamin = $request->input('jenis_kelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->tempat_lahir = $request->input('tempat_lahir');
        $dosen->tanggal_lahir = $request->input('tanggal_lahir');
        $dosen->photo = $namaFile;
        $dosen->save();
    }

    public function show(Dosen $dosen)
    {
        return view('dosen.detail', [
        'dosen' => $dosen,
        ]);
    }

    public function edit($id){
    {
        $data = Dosen::find($id);
        return view(view: 'dosen.edit', data:['dosen' => $data]);
    }
       
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate(rules:[
            'nidn' => 'required|max:25',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'photo' => 'require|file|image|max:2000',
            'updated_at' => now()
        ]);

        $dosen = Dosen::find($id);
        $dosen->nidn = $request->input('nidn');
        $dosen->nama = $request->input('nama');
        $dosen->jenis_kelamin = $request->input('jenis_kelamin');
        $dosen->alamat = $request->input('alamat');
        $dosen->tempat_lahir = $request->input('tempat_lahir');
        $dosen->tanggal_lahir = $request->input('tanggal_lahir');

        if($request->hasFile('photo')){
            $destination = 'public'.$request->photo;
            if(File::exists($destination)){
                File::delete($destination);
        }
        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = 'dosen_'. time() . "." . $extFile;
        $path = $request->photo->storeAs('public',$namaFile);
        $newPath = asset('storage/'.$namaFile);

            $dosen->photo = $namaFile;
            
        }
        return redirect()->route(route:'dosen.index')
        ->with(key: 'message', value: "Data Dosen {$validate['nama']} berhasil diperbaharui");
    }
 
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if($dosen->photo){
            Storage::delete($dosen->photo);
        }
        return redirect()->route(route:'dosen.index')
        ->with(key: 'message', value: "Data Dosen{$dosen['nama']} berhasil dihapus!");
    }   
}