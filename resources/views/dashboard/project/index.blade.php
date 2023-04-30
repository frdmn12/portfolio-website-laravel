@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Project</p>
    <div class="pb-3">
        <a href="{{ route('project.create') }}" class="btn btn-primary">+ Tambah Project</a>
    </div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Nama Project</th>
                    <th>Desc</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td >
                            <img src="{{ asset('images/' . $item->gambar) }}" alt="gambar"
                                style="width: 100px; height: 100px">
                            <h5 class="d-inline m-2">{{ $item->judul }} </h5>
                        </td>
                        <td>{{ strip_tags($item->desc) }}</td>
                        <td>
                            <a href="{{ route('project.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin mau hapus data ini ?')"
                                action="{{ route('project.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
