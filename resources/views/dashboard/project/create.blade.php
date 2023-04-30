@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">

        <a href="{{ route('project.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Nama Project</label>
            <input type="text" class="form-control" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Nama project">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Preview Project (Gambar)</label>
            <input type="file" class="form-control" name="gambar" id="gambar" aria-describedby="helpId">
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link Project</label>
            <input type="url" class="form-control" name="link" id="nama" aria-describedby="helpId"
                placeholder="link dari project" >
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Deskripsi</label>
            <textarea name="desc" class="form-control summernote" cols="5"></textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
