<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class lgController extends Controller
{
    public function Login(Request $request)
    {
        $credentials = $request->only(["email", "password", "name"]);
        if (Auth::attempt($credentials)) {
            return redirect("/dataReg");
        }
        return redirect("/")->with(
            "message",
            "Login gagal! Data tidak sesuai!"
        );
    }
    public function Logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
