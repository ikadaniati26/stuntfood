@extends('website.main.index')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col">
                    <div class="card mb-4 shadow">
                        <div class="me-3 px-5 mt-5 mb-5">
                            <div>
                                <h3>Tabel Sub Menu</h3>
                                <p>berdasarkan paket menu yang direkomendasikan diatas, maka disarankan memberikan makanan
                                    lengkap dalam satu piring sebanyak 3x dalam sehari, dengan berat yang sudah
                                    direkomendasikan berikut ini:
                            </div>

                            <div class="table-responsive text-nowrap px-5 mt-2">
                                <table class="table table-striped mb-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Paket</th>
                                            <th scope="col">Waktu Makan</th>
                                            <th scope="col">Nama Makanan</th>
                                            <th scope="col">Jenis Makanan</th>
                                            <th scope="col">Berat</th>
                                            <th scope="col">Protein</th>
                                            <th scope="col">Karbohidrat</th>
                                            <th scope="col">Lemak</th>
                                            <th scope="col">Energi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($joindata as $index => $item)
                                            @if ($index % 4 == 0)
                                                <tr>
                                                    <td rowspan="4">{{ $item->paket }}</td>
                                                    <td rowspan="4">{{ $item->waktu_makan }}</td>
                                                    <td>{{ $item->nama_makanan }}</td>
                                                    <td>{{ $item->jenis_makanan }}</td>
                                                    <td>{{ number_format($Berat[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Protein[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Karbo[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Lemak[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Energi[$index], 2, '.', '') }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>{{ $item->nama_makanan }}</td>
                                                    <td>{{ $item->jenis_makanan }}</td>
                                                    <td>{{ number_format($Berat[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Protein[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Karbo[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Lemak[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($Energi[$index], 2, '.', '') }}</td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4  shadow">
                        <div class="me-3 px-5 mt-5">
                            <div>
                                <h3>Tabel Selingan</h3>
                                <p>berdasarkan paket menu yang direkomendasikan diatas, maka disarankan memberikan makanan
                                    selingan berikut ini:
                            </div>
                            <div class="table-responsive text-nowrap px-5 mt-2">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Paket</th>
                                            <th scope="col">Waktu Makan</th>
                                            <th scope="col">Nama Selingan</th>
                                            <th scope="col">Berat</th>
                                            <th scope="col">Protein</th>
                                            <th scope="col">karbohidrat</th>
                                            <th scope="col">lemak</th>
                                            <th scope="col">energi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php $no=1; @endphp
                                        @foreach ($dataSelingan as $index => $item)
                                            @if ($index % 4 == 0)
                                                <tr>
                                                    <td rowspan="4">{{ $item->paket }}</td>
                                                    <td>{{ $item->waktu_makan }}</td>
                                                    <td>{{ $item->menu }}</td>
                                                    <td>{{ number_format($BeratSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($ProteinSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($KarbohidratSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($LemakSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($EnergiSelingan[$index], 2, '.', '') }}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>{{ $item->waktu_makan }}</td>
                                                    <td>{{ $item->menu }}</td>
                                                    <td>{{ number_format($BeratSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($ProteinSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($KarbohidratSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($LemakSelingan[$index], 2, '.', '') }}</td>
                                                    <td>{{ number_format($EnergiSelingan[$index], 2, '.', '') }}</td>
                                                </tr>
                                            @endif
                                        @endforeach 
                                     

                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
