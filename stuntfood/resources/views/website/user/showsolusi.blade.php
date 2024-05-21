@extends('website.main.index')

@section('content')


<div class="content-wrapper">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <embed class="embed-responsive-item w-100" src="{{ asset('public/solusi/tumisbayam.pdf') }}" type="application/pdf"  style="width: 100%; height: 100vh;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
