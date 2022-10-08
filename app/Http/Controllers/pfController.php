<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bioModel;
use auth;

class pfController extends Controller
{
    public function profile()
    {
        if (
            count(bioModel::all()->where("email", auth()->user()->email)) === 0
        ) {
            return redirect("/dataReg")->with(
                "error",
                "Tidak ditemukan email yang sama!"
            );
        }
        return view("pages.profile", [
            "biodata" => bioModel::where(
                "email",
                auth()->user()->email
            )->firstOrFail(),
        ]);
    }
}
