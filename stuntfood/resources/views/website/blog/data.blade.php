@extends('website.main.index')

@section('content')

<div class="container col-xxl-8 py-3">

    @if(session("success"))
        <div class="alert alert-success">
        {{session("success")}}
        </div>
    @endif

    <div class="card bg-white p-4 shadow-lg rounded-4 border-0">
        <div class="d-flex justify-content-between mb-4">
            <div>
                <h4>#Data Resep</h4>
            </div>
            <div>
                <a href="{{ route('create') }}" class="btn btn-primary" style="background-color: green">Create Resep</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Paket</th>
                        <th>Judul</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($artikels as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->paket }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <img src="{{ asset('/public/assets/img/gambar/resep/'.$item->image) }}" alt="Image" class="img-fluid" style="max-width: 100px; height: auto;">
                            </td>
                            <td>
                                <form method="POST" action="{{ route('destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('detailresep', ['id' => $item->id]) }}" class="btn btn-info btn-sm"> <i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('editresep', ['id' => $item->id]) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Anda Yakin Data akan diHapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>

                                
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      

    </div>
</div>

@endsection
