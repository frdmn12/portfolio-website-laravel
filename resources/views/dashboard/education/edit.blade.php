@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">

        <a href="{{route('education.index')}}" class="btn btn-secondary">Back</a>
    </div>
    <form action="{{route('education.update' , $data->id)}}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Sekolah</label>
          <input type="text"
            class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Nama Sekolah" value="{{$data->nama}}">
        </div>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan (Field Study)</label>
          <input type="text"
            class="form-control" name="jurusan" id="jurusan" aria-describedby="helpId" placeholder="Jurusan yang ditempu" value="{{$data->jurusan}}">
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tanggal Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="start_date" value="{{$data->start_date}}">
                </div>
                <div class="col-auto">Tanggal Akhir</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="end_date" value="{{$data->end_date}}">
                </div>
            </div>
        </div>
        <div class="mb-3">
          <label for="isi" class="form-label">Deskripsi</label>
          <textarea name="desc" class="form-control summernote" cols="5" >{{$data->desc}}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
    </form>
@endsection
