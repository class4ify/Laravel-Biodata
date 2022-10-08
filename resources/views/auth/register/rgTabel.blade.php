@extends('layouts.master')
@section('judul', 'Register')
@section('header', 'Daftar Register')
@section('tabel')
<div class="card">
    <div class="card-body">
        <form action="/searchReg" method="GET">
            <div class="row mb-4 float-right">
                <input class="form-control border col mr-1" type="text" name="search" placeholder="Search By Name...">
                <button class="btn" value="Search">
                    <type="submit"><i class="fa fa-search" style="font-size:18px"></i>
                </button>
            </div>
        </form>
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block alert-dismissible fade show">
            <strong style='font-size: 14px'>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block alert-dismissible fade show">
            <strong style='font-size: 14px'>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <!-- Ini yg di file rgtabel.blade.php  -->
                    <th scope="col">No.</th>
                    <th scope="col">Name</th> <!-- Semua kecuali Name sama E-Mail dihapus -->
                    <th scope="col">E-Mail</th>
                    <th scope="col">Password</th><!-- Trus tambahin Password -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach($bio as $p)
                <tr>
                    <th scope="row">{{$n++}}</th>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td><!-- Yg dibawah sini sama yg di file rgubah juga jangan lupa -->
                    <td>******</td>
                    <td>
                        <form action="{{route('hapusReg', $p->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/ubahReg/{{ $p->id }}" class="btn btn-warning btn-sm">Ubah</a>
                            <Button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection