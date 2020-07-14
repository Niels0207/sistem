@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Buku
                </div>

                <div class="card-body">
                    {!! Form::open(['route'=>['buku.update', $buku->id],'method'=>'put']) !!}
                    <div class="form-group @if($errors->has('judul_buku')) has error @endif">
                        {!! Form::label('Judul Buku') !!}
                        {!! Form::text('judul_buku', $buku->buku, ['class'=>'form-control', 'placeholder' => 'Judul Buku']) !!}
                        @if($errors->has('judul_buku'))
                            <span class="help-block">{{!! $errors->first('judul_buku')!!}}</span>
                        @endif 
                    </div>
                    <div class="form-group @if($errors->has('penulis')) has error @endif">
                        {!! Form::label('Penulis') !!}
                        {!! Form::text('penulis', $buku->penulis , ['class'=>'form-control', 'placeholder' => 'Penulis']) !!}
                        @if($errors->has('penulis'))
                            <span class="help-block">{{!! $errors->first('penulis')!!}}</span>
                        @endif 
                    </div>
                    <div class="form-group @if($errors->has('deskripsi')) has error @endif">
                        {!! Form::label('Deskripsi') !!}
                        {!! Form::textarea('deskripsi', $buku->deksipsi , ['class'=>'form-control', 'placeholder' => 'Deskripsi']) !!}
                        @if($errors->has('deskripsi'))
                            <span class="help-block">{{!! $errors->first('deskripsi')!!}}</span>
                        @endif 
                    </div>
                    {!! Form::submit('Update', ['class'=>'btn btn-sm btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
