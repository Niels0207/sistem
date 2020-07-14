@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    List Buku
                    <a href="{{route('buku.create')}}" class="btn btn-sm btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="30">No</th>
                                <th scope="col" width="120">Judul Buku</th>
                                <th scope="col" width="120">Penulis</th>
                                <th scope="col" width="130">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $buk)
                            <tr>
                                <td>{{ $buk->id}}</td>
                                <td>{{ $buk->judul_buku}}</td>
                                <td>{{ $buk->penulis}}</td>
                                <td>{{ $buk->deskripsi}}</td>
                            </tr>                                
                            @endforeach
                        </tbody>
                        
                    </table>
                    <hr>
                    <a href="{{route('buku.index')}}" class="float-right btn btn-sm btn-primary">Back</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
