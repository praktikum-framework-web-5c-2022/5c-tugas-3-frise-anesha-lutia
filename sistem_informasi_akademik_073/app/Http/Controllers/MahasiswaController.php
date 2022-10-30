<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::get();
        return view( view: 'mahasiswa.index', data:['mahasiswa' => $mahasiswa]);
    }

    public function create(){
        return view(view: 'mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'npm' => 'required|max:25',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'photo' => 'require|file|image|max:2000',
        ]);
        dump(var: $validate);
        
        return redirect()->route(route:'mahasiswa.index')
        ->with(key: 'message', value: "Data Mahasiswa {$validate['nama']} berhasil ditambahkan");

        if($request->hasFile('photo')){
            $extFile = $request->photo->getClientOriginalExtension();
            $namaFile = 'mahasiswa_'. time() . "." . $extFile;
            $path = $request->photo->storeAs('public',$namaFile);
            $newPath = asset('storage/'.$namaFile);
        }
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = $request->input('npm');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        $mahasiswa->photo = $namaFile;
        $mahasiswa->save();
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.detail', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function edit($id){
    {
        $data = Mahasiswa::find($id);
        return view(view: 'mahasiswa.edit', data:['mahasiswa' => $data]);
    }
       
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'npm' => 'required|max:25',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'photo' => 'require|file|image|max:2000',
            'updated_at' => now()
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nidn = $request->input('npm');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->tempat_lahir = $request->input('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->input('tanggal_lahir');
        
        if($request->hasFile('photo')){
            $destination = 'public'.$request->photo;
            if(File::exists($destination)){
                File::delete($destination);
        }
        $extFile = $request->photo->getClientOriginalExtension();
        $namaFile = 'mahasiswa_'. time() . "." . $extFile;
        $path = $request->photo->storeAs('public',$namaFile);
        $newPath = asset('storage/'.$namaFile);

            $mahasiswa->photo = $namaFile;
            
        }
        return redirect()->route(route:'mahasiswa.index')
        ->with(key: 'message', value: "Data Mahasiswa{$validate['nama']} berhasil diperbaharui");
    }
 
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa->photo){
            Storage::delete($mahasiswa->photo);
        }
        return redirect()->route(route:'mahasiswa.index')
        ->with(key: 'message', value: "Data Mahasiswa{$mahasiswa['nama']} berhasil dihapus!");
    }   
}


