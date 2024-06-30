@extends('website.main.index')

@section('content')

<div class="container col-xxl-8 py-3">
    <div class="card bg-white p-4 shadow rounded-4 border-0">
        
        <p class="mb-4"> 
            <a href="{{ route('data') }}" class="text-decoration-none text-dark">Data</a> / Edit Resep
         </p>

        @foreach ($hasil_edit as $e)
        <form action="{{ route('updateresep', $e->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group mb-3">
                <label for="">Masukkan Paket</label>
                <input type="text" class="form-control" name="paket" value="{{ $e->paket }}">
                @if ($errors->has('judul'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('judul') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="">Masukkan judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $e->judul }}">
                @if ($errors->has('judul'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('judul') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-3">
                <label for="">Upload Image</label><br>
                <!-- Menampilkan gambar yang sudah ada -->
                @if (!empty($e->image))
                    <img src="{{ asset('/public/assets/img/gambar/resep/' . $e->image) }}" alt="Current Image" style="max-width: 200px; margin-bottom: 10px;"><br>
                @endif
                <!-- Input untuk mengunggah gambar baru -->
                <input type="file" class="form-control" name="image" id="image">
            
                @if ($errors->has('image'))
                    <span class="error text-danger mt-2">
                        {{ $errors->first('image') }}
                    </span>
                @endif
            </div>
            

            <div class="form-group mb-3">
                <label for="">Masukkan Artikel</label>
                <textarea name="desc" id="summernote" class="form-control">{{ $e->desc }}</textarea>
                @if ($errors->has('desc'))
                    <span class="error text-danger mb-2">
                        {{ $errors->first('desc') }}
                    </span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary"  style="background-color: blue">Update</button>
        </form>
        @endforeach
         
    </div>
</div>

@endsection

