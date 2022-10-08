<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bioModel;
use Session;

class bioController extends Controller
{
    public function index()
    {
        $bio = bioModel::all();
        return view("pages.tabel", ["bio" => $bio]);
    }
    public function ubah($id)
    {
        $bioUbah = bioModel::findOrFail($id);
        // dd($bioUbah)
        return view("pages.ubah", ["bioUbah" => $bioUbah]);
    }
    public function hapusBio($idHapus)
    {
        $bioHapus = bioModel::findOrFail($idHapus);
        $bioHapus->delete();
        Session::flash("sukses", "Hapus data sukses!!");
        return redirect("/data");
    }
    public function tambahBio(Request $request)
    {
        $request->validate(
            [
                "nama" => "required",
                "nis" => "required|unique:bio_models",
                "kelas" => "required",
                "email" => "required|unique:bio_models",
                "tgllhr" => "required",
            ],
            [
                "nama.required" => "Nama tidak boleh kosong",
                "nis.required" => "NIS tidak boleh kosong",
                "nis.unique" => "NIS sudah terdaftar",
                "kelas.required" => "Kelas tidak boleh kosong",
                "email.required" => "Email tidak boleh kosong",
                "email.unique" => "Email sudah terdaftar",
                "tgllhr.required" => "Tanggal Lahir tidak boleh kosong",
            ]
        );
        $data = bioModel::create([
            "nama" => $request->nama,
            "nis" => $request->nis,
            "kelas" => $request->kelas,
            "email" => $request->email,
            "tgllhr" => $request->tgllhr,
        ]);
        if ($data) {
            Session::flash("sukses", "Tambah data Sukses!!");
            return redirect("/data");
        }
    }
    public function ubahBio($id, Request $request)
    {
        $request->validate(
            [
                "nama" => "required",
                "kelas" => "required",
                "email" => "required",
                "nis" => "required",
                "tgllhr" => "required",
            ],
            [
                "nama.required" => "Nama tidak boleh kosong",
                "kelas.required" => "Kelas tidak boleh kosong",
                "nis.required" => "NIS tidak boleh kosong",
                "email.required" => "Email tidak boleh kosong",
                "tgllhr.required" => "Tanggal Lahir tidak boleh kosong",
            ]
        );
        $bioUpdate = bioModel::findOrFail($id);
        $bioUpdate->nama = $request->nama;
        $bioUpdate->kelas = $request->kelas;
        $bioUpdate->email = $request->email;
        $bioUpdate->nis = $request->nis;
        $bioUpdate->tgllhr = $request->tgllhr;
        $bioUpdate->save();
        Session::flash("sukses", "Update Data Sukses!!");
        return redirect("/data");
    }
    public function search(Request $request)
    {
        $searchResult = $request->search;
        $result = bioModel::where(
            "nama",
            "like",
            "%" . $searchResult . "%"
        )->paginate();
        return view("pages.tabel", ["bio" => $result]);
    }
}
