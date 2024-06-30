@extends('website.main.index')

@section('content')

<section id="blog">
<div class="container col-xxl-10 py-3">
    <div class="row">
      @foreach ($resep as $item)
      <div class="col-md-6 col-lg-3 mb-3">
        <div class="card h-100">
          <img class="card-img-top" src="{{ asset('/public/assets/img/gambar/resep/'.$item->image) }}" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">{{ $item->judul }}</h5>
            {{-- <p class="card-text">{{ $item->}} </p> --}}
            <a href="{{ route('detailresep', ['id' => $item->id]) }}" class="btn btn-outline-primary">lihat detail resep</a>
          </div>
        </div>
      </div>
      @endforeach
    
      
    </div>
</div>

</section>
@endsection