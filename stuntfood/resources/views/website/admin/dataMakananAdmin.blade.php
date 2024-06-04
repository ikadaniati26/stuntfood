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
        <h5 class="card-header mb-0">#Data Paket Menu Makanan</h5>
      
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
                <th>Menu</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-1">
              @php
                   $no=1;
              @endphp
                @foreach ($query as $index => $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->paket }}</td>
                  <td>{{ $item->waktu_makan }}</td>
                  <td>{{ $item->menu }}</td>
                  @if ($index % 5 == 0)
                  <td rowspan="5">
                    <form method="POST" action="{{ route('hapus', ['id'=>$no]) }}">
                      @csrf
                      @method('DELETE')
                      <a href="{{ url('showadmin', ['paket' => $item->paket]) }}" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                  
                      <a class="btn btn-warning btn-sm" title="Edit"
                          href="{{ route('edit', ['paket'=>$item->paket]) }}">
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
                  @endif
                </tr>
                @endforeach
            </tbody>
          </table>
      

        </div>
      </div>
    </div>
  </div>


  <!-- Tautkan Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
