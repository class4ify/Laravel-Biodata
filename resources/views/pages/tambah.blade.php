@extends('layouts.master')
@section('judul', 'Tambah Biodata')
@section('header', 'Tambah Biodata')
@section('form')
<div class="card">
    <div class="card-body">
        <form method="post" action="/tambahBio" class="ml-1 mr-3">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control border " id="inputPassword" placeholder="Nama">
                    @if ($errors->has('nama'))
                    <div class="class">
                        {{ $errors->first('nama') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="number" name="nis" class="form-control border" id="inputPassword" placeholder="NIS">
                    @if ($errors->has('nis'))
                    <div class="class">
                        {{ $errors->first('nis') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Kelas</label>
                <div class="col-sm-10">
                    <input type="text" name="kelas" class="form-control border" id="inputPassword" placeholder="Kelas">
                    @if ($errors->has('kelas'))
                    <div class="class">
                        {{ $errors->first('kelas') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control border" id="inputPassword" placeholder="Email">
                    @if ($errors->has('email'))
                    <div class="class">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tgllhr" class="form-control border" id="inputPassword">
                    @if ($errors->has('tgllhr'))
                    <div class="class">
                        {{ $errors->first('tgllhr') }}
                    </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn" style="color:#f9f9f9; background-color:#4C566A;">Submit</button>
        </form>
    </div>
</div>
@endsection