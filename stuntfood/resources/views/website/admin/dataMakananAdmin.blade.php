@extends('website.main.index')

@section('content')
  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">#Tabel menu makan</span></h4>

      <div class="card">
        <h5 class="card-header">Data Paket Menu Makanan</h5>
        <div class="table-responsive text-nowrap">
          <button type="button" class="btn btn-success btn-sm" id="addForm"><a href="{{ url('created') }}">+Tambah Data</a></button>
          <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Paket</th>
                <th>Waktu makan</th>
                <th>Nama Makanan</th>
                <th>protein</th>
                <th>karbohidrat</th>
                <th>lemak</th>
                <th>energi</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-1">
                @foreach ($query as $item)
                <tr>
                  <td>{{ $item->idDataMakanan}}</td>
                  <td>{{ $item->paket }}</td>
                  <td>{{ $item->waktu_makan }}</td>
                  <td>{{ $item->nama_makanan }}</td>
                  <td>{{ $item->protein }}</td>
                  <td>{{ $item->lemak }}</td>
                  <td>{{ $item->karbohidrat }}</td>
                  <td>{{ $item->energi }}</td>
                  <td>
                    <a href="{{ route('editadmin', ['id' => $item->idDataMakanan]) }}">Edit</a>
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
