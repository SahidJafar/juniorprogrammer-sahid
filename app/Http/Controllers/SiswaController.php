<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    public function siswa(){
        $siswas = Siswa::with('ekstrakulikuler')->get();
        return view('welcome', compact('siswas'));
    }
    public function index()
    {
        $siswas = Siswa::with('ekstrakulikuler')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function create()
    {
        $ekstrakulikulers = Ekstrakulikuler::orderBy('nama_ekstrakulikuler','ASC')->get();
        return view('admin.siswa.create', compact('ekstrakulikulers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ekstrakulikuler_id' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required|numeric',
            'no_induk_siswa' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'required',
        ], [
            'ekstrakulikuler_id.required' => 'Ekstrakulikuler is Required',
            'nama_depan.required' => 'Nama Depan is Required',
            'nama_belakang.required' => 'Nama Belakang is Required',
            'no_hp.required' => 'No Hp is Required',
            'no_hp.numeric' => 'No Hp must be a number',
            'no_induk_siswa.required' => 'No Induk Siswa is Required',
            'alamat.required' => 'Alamat is Required',
            'jenis_kelamin.required' => 'Jenis Kelamin is Required',
            'foto.required' => 'Foto is Required'
        ]);

        // Proses upload gambar
        $image = $request->file('foto');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload/siswa'), $name_gen);

        $save_url = 'upload/siswa/' . $name_gen;


       Siswa::create([
            'ekstrakulikuler_id' => $request->ekstrakulikuler_id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'no_induk_siswa' => $request->no_induk_siswa,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $save_url,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Siswa Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.siswa')->with($notification);
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $ekstrakulikulers = Ekstrakulikuler::orderBy('nama_ekstrakulikuler','ASC')->get();
        return view('admin.siswa.edit', compact('siswa', 'ekstrakulikulers'));
    }

    public function update(Request $request)
    {
        $siswa = Siswa::findOrFail($request->id);

        $request->validate([
            'ekstrakulikuler_id' => 'required',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required|numeric',
            'no_induk_siswa' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto tidak wajib saat update
        ]);

        // Jika ada file gambar baru
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/siswa'), $name_gen);
            $save_url = 'upload/siswa/' . $name_gen;

            // Hapus foto lama jika ada
            if (File::exists(public_path($siswa->foto))) {
                File::delete(public_path($siswa->foto));
            }

            $siswa->update([
                'foto' => $save_url,
            ]);
        }

        // Update data siswa
        $siswa->update([
            'ekstrakulikuler_id' => $request->ekstrakulikuler_id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'no_induk_siswa' => $request->no_induk_siswa,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('admin.siswa')->with('message', 'Siswa Updated Successfully')->with('alert-type', 'success');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        if (File::exists(public_path($siswa->foto))) {
            File::delete(public_path($siswa->foto));
        }
        $siswa->delete();
        return redirect()->route('admin.siswa')->with('message', 'Siswa Deleted Successfully')->with('alert-type', 'success');
    }
}
