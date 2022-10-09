@extends('layouts.master')
@section('judul', 'Biodata')
@section('header', 'Daftar Biodata')
@section('tabel')
<div class="card">
    <div class="card-body">
        <form action="/search" method="GET">
            <div class="row mb-4 float-right">
                <input class="form-control border col mr-2" type="text" name="search" placeholder="Search By Name...">
                <button class="btn" value="Search">
                    <type="submit"><i class="fa fa-search" style="font-size:18px"></i>
                </button>
            </div>
        </form>
        <table class="table table-sm">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block alert-dismissible fade show">
                <strong style='font-size: 14px'>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach ($bio as $p)
                <tr>
                    <th scope="row">{{ $n++ }}</th>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->nis }}</td>
                    <td>{{ $p->kelas }}</td>
                    <td>{{ $p->email }}</td>
                    <!-- <td>{{ $p->tmptlhr }}</td> -->
                    <td>{{ $p->tgllhr }}</td>
                    <td>
                        <form action="{{ route('hapus', $p->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/ubah/{{ $p->id }}" class="btn btn-warning btn-sm">Ubah</a>
                            <Button type="submit" class="btn btn-danger btn-sm">Hapus</Button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection