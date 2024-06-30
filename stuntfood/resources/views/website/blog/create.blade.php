@extends('website.main.index')

@section('content')

<div class="container col-xxl-8 py-3">
    <div class="card bg-white p-4 shadow-lg rounded-4 border-0">
        
        <p class="mb-4"> 
            <a href="{{ route('data') }}" class="text-decoration-none text-dark">Data</a> / Create Artikel
         </p>
        
         <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="">Masukkan Paket</label>
                <input type="text" class="form-control" name="paket">
                @if ($errors->has('paket'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('paket') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="">Masukkan judul</label>
                <input type="text" class="form-control" name="judul">
                @if ($errors->has('judul'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('judul') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="">Upload Image</label>
                <input type="file" class="form-control" name="image">
                @if ($errors->has('image'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('image') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="">Masukkan Artikel</label>
                <textarea name="desc" id="summernote" class="form-control"></textarea>
                @if ($errors->has('desc'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('desc') }}
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary"  style="background-color: blue">Simpan</button>
         </form>
    </div>
</div>

@endsection

