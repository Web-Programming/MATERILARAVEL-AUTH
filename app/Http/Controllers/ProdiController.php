<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programstudi;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Tugas : 
    //Tampilkan data Program Studi di dalam Tabel
    //Tampilkan tombol aksi (action) edit dan hapus

    public function index(){
        $programstudi = Programstudi::all();
        $kampus = "Universitas MDP";
        return view("programstudi.index", compact('programstudi', 'kampus'));
    }

    public function create()
    {
       $kampus = "Universitas MDP";
       return view("programstudi.create", compact('kampus'));
    }

    public function store(Request $request)
    {
        //0. Lakukan Validation
        $validation = $request->validate([
           'nama' => 'required|min:5|max:20',
           'foto' => 'required|file|image|max:5000'
           //field dan atauran lainnya
        ]);

        //proses upload file
        $ext = $request->foto->getClientOriginalExtension();
        $nama_file = "foto-".time().".".$ext;
        $path = $request->foto->storeAs("public", $nama_file);

        //1. ambil nilai inputan form
        //2. panggil fungsi insert - boleh raw / eloquent
        $programstudi = new Programstudi();
        $programstudi->nama_prodi = $request->nama; // $validation['nama']
        $programstudi->kode_prodi = $request->kode; 
        $programstudi->id_fakultas = 1;
        $programstudi->foto = $nama_file;
        $programstudi->save();

        //3. redirect ke halaman index / detail / form create
        $request->session()->flash("info", "Data prodi $request->nama berhasil disimpan!");
        return redirect()->route("programstudi.create");
    }

    public function show(Request $request, $id)
    {
        # code...
        $programstudi = Programstudi::find($id);
        $kampus = "Univesitas MDP";
        return view("programstudi.view", compact('programstudi', 'kampus'));
    }

    public function edit(Request $request, $id)
    {
        # code...
        $programstudi = Programstudi::find($id);
        $kampus = "Univesitas MDP";
        return view("programstudi.edit", compact('programstudi', 'kampus'));
    }

    public function update(Request $request, $id)
    {
        //0. Lakukan Validation
        if ($request->hasFile('foto')) {    //validation jika ada file baru yg akan di upload
            $validation = $request->validate([
                'nama' => 'required|min:5|max:20',
                'foto' => 'required|file|image|max:5000'
            ]);

            //proses upload file
            $ext = $request->foto->getClientOriginalExtension();
            $nama_file = "foto-".time().".".$ext;
            $path = $request->foto->storeAs("public", $nama_file);

        }else{                              //validation jika tidak upload file
            $validation = $request->validate([
                'nama' => 'required|min:5|max:20'
            ]);
        }

        //1. ambil nilai inputan form
        //2. panggil fungsi get data by id 
        $programstudi = Programstudi::find($id);
        $programstudi->nama_prodi = $request->nama; // $validation['nama']
        $programstudi->kode_prodi = $request->kode;
        $programstudi->foto = ($request->hasFile('foto')) ? $nama_file : $programstudi->foto;

        $programstudi->save();

        //3. redirect ke halaman index / detail / form edit
        $request->session()->flash("info", "Data prodi $request->nama berhasil diupdate!");
        return redirect()->route("programstudi.edit", [$id]);
    }

    public function destroy(Request $request, $id)
    {
        $programstudi = Programstudi::find($id);
        if($programstudi->id){
            $programstudi->delete();
        }
        
        $request->session()->flash("info", "Data prodi $request->nama berhasil dihapus!");
        return redirect()->route("programstudi.index");
    }
}


