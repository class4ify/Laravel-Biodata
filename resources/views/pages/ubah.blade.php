@extends('layouts.master')
@section('header', 'Ubah Biodata')
@section('form')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/ubahbio/{{$bioUbah->id}}">
            @csrf
            @method('PUT')
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong style='font-size: 14px'>{{ $message }}</strong>
            </div>
            @endif
            <div class="form-group">
                <label>Name</label>
                <input name="nama" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter Your Name" value="{{$bioUbah->nama}}">
                @if ($errors->has('nama'))
                <div class="class">
                    {{$errors->first('nama')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Kelas</label>
                <input name="kelas" type="text" class="form-control" id="exampleInputClass1" aria-describedby="classHelp" placeholder="Enter Your Class" value="{{$bioUbah->kelas}}">
                @if ($errors->has('kelas'))
                <div class="class">
                    {{$errors->first('kelas')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Akun Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$bioUbah->email}}">
                @if ($errors->has('email'))
                <div class="class">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>NIS</label>
                <input name="nis" type="tel" class="form-control" id="exampleInputNis1" placeholder="NIS" value="{{$bioUbah->nis}}">
                @if ($errors->has('nis'))
                <div class="class">
                    {{$errors->first('nis')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input name="tgllhr" type="date" class="form-control" id="exampleInputDate1" aria-describedby="dateHelp" placeholder="Enter Your Birth Date" value="{{$bioUbah->tgllhr}}">
                @if ($errors->has('tgllhr'))
                <div class="class">
                    {{$errors->first('tgllhr')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn " style="color:#f9f9f9; background-color:#4C566A;">Submit</button>
        </form>
    </div>
</div>
@endsection