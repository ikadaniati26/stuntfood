@extends('website.main.index')

@section('content')
<section id="detail">


    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->judul }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .breadcrumb-item a {
            text-decoration: none;
            color: #6c757d;
        }
        .breadcrumb-item a:hover {
            color: #343a40;
        }
      
        .img-fluid {
            max-height: 500px;
            object-fit: cover;
        }
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }
        .fw-bold {
            font-weight: 700 !important;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem !important;
        }
        .recipe-details {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 20px;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175);
        }
        .section-title {
            color: #dc3545;
            border-bottom: 2px solid #dc3545;
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container py-0">
        <div class="bg-light p-3 rounded-3 shadow-lg">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('resep') }}" class="text-decoration-none text-dark">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $blog->judul }}</li>
                </ol>
            </nav>

            <div class="text-center mb-4">
                <img src="{{ asset('/public/assets/img/gambar/resep/'.$blog->image) }}" class="img-fluid rounded-3 shadow-lg" alt="{{ $blog->judul }}">
            </div>

            <h1 class="fw-bold text-center mb-3">{{ $blog->judul }}</h1>
            <p class="text-muted text-center mb-4">Dipublikasikan pada {{ date('d F Y', strtotime($blog->updated_at)) }}</p>
            
          
            <p>{!! $blog->desc !!}</p>
        </div>

       
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

</section>
@endsection
