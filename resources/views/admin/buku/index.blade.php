@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {{Session('message')}}
            </div>
            @endif

            @if(Session::has('delete-message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                {{Session('delete-message')}}
            </div>
            @endif
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
                                <th scope="col" width="130">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $buk)
                            <tr>
                                <td>{{ $buk->id}}</td>
                                <td>{{ $buk->judul_buku}}</td>
                                <td>{{ $buk->penulis}}</td>
                                <td>{{ $buk->deskripsi}}</td>
                                <td>
                                    <a href="{{route('buku.show', $buk->id)}}" class="btn btn-sm btn-info">Show</a>
                                    <a href="{{route('buku.edit', $buk->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                    {!! Form::open(['route' => ['buku.destroy', $buk->id], 'method'=>'delete', 'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
