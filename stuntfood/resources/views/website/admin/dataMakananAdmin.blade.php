@extends('website.main.index')

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      
      @if(session("success"))
        <div class="alert alert-success">
          {{session("success")}}
        </div>
      @endif

      <div class="card">
        <h5 class="card-header mb-0">#Data Paket Menu Makanan{{ session('auth_user') }}</h5>
      
        <div class="table-responsive text-nowrap">
          <a href="{{ url('created') }}">
              <button id="addForm" type="button" class="btn btn-primary  mt-4 mx-4" style="background-color: blue">+tambah data</button>
          </a>
          <table class="table">
            <thead>
              <tr>
                <th>Nomor</th>
                <th>Paket</th>
                <th>Waktu makan</th>
                <th>Namaa Makanan</th>
                <th>protein</th>
                <th>karbohidrat</th>
                <th>lemak</th>
                <th>energi</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-1">
              @php
                   $no=1;
              @endphp
                @foreach ($query as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->paket }}</td>
                  <td>{{ $item->waktu_makan }}</td>
                  <td>{{ $item->nmenu }}</td>
                  <td>{{ $item->protein }}</td>
                  <td>{{ $item->lemak }}</td>
                  <td>{{ $item->karbohidrat }}</td>
                  <td>{{ $item->energi }}</td>
                  <td>
                    <form method="POST" action="{{ route('hapus', ['id'=>$item->idData_makanan]) }}">
                      @csrf
                      @method('DELETE')
                      <a class="btn btn-warning btn-sm" title="Edit Akun Bidan"
                          href="{{ route('edit', ['id'=>$item->idData_makanan]) }}">
                          <i class="fa-solid fa-pencil"></i>
                      </a>
                      &nbsp;
                      <button type="submit" class="btn btn-danger btn-sm"
                          title="Hapus Pegawai"
                          onclick="return confirm('Anda Yakin Data akan diHapus?')">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  
                  
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>

  <!-- Tautkan Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
