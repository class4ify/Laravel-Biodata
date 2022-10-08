@extends('layouts.master')
@section('header', 'Ubah Register')
@section('form')
<div class="card">
    <div class="card-body">
        <form method="POST" action="/ubahDataReg/{{$regUbah->id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" placeholder="Enter Your Name" value="{{$regUbah->name}}">
                @if ($errors->has('name'))
                <div class="class">
                    {{$errors->first('name')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$regUbah->email}}">
                @if ($errors->has('email'))
                <div class="class">
                    {{$errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputpassword1" aria-describedby="passwordHelp" placeholder="Enter password" value="{{$regUbah->password}}">
                @if ($errors->has('password'))
                <div class="class">
                    {{$errors->first('password')}}
                </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection