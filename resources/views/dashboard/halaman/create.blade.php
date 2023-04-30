@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">

        <a href="{{route('halaman.index')}}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{route('halaman.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="judul" class="form-label">Judul</label>
          <input type="text"
            class="form-control" name="judul" id="judul" aria-describedby="helpId" placeholder="Judul" value="{{Session::get('judul')}}">
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Isi</label>
          <textarea name="isi" class="form-control summernote" cols="5" >{{Session::get('isi')}}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
