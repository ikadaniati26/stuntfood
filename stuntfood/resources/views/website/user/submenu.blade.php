@extends('website.main.index')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col">
                    <div class="card mb-4  shadow">
                        <div class="me-3 px-5 mt-5">
                            <div>
                                <h3>Tabel Sub Menu</h3>
                                <p>berdasarkan paket menu yang direkomendasikan diatas, maka disarankan memberikan makanan
                                    lengkap dalam satu piring sebanyak 3x dalam sehari, dengan berat yang sudah
                                    direkomendasikan berikut ini:
                            </div>

                            <div class="table-responsive text-nowrap px-5 mt-2">
                                <table class="table table-striped">
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
                                        @php
                                            // Mengambil nilai berat energi dari session
                                            $beratEnergi = session('beratEnergi', []);
                                        @endphp
                                
                                        @foreach ($detail as $item)
                                            @php
                                                // Menentukan waktu makan yang sesuai untuk mengambil nilai dari session
                                                $berat = '';
                                                if ($item->waktu_makan == 'makan pagi' && !empty($beratEnergi['pagi'])) {
                                                    $berat = $beratEnergi['pagi'][$item->jenis_makanan] ?? '';
                                                } elseif ($item->waktu_makan == 'makan siang' && !empty($beratEnergi['siang'])) {
                                                    $berat = $beratEnergi['siang'][$item->jenis_makanan] ?? '';
                                                } elseif ($item->waktu_makan == 'makan malam' && !empty($beratEnergi['malam'])) {
                                                    $berat = $beratEnergi['malam'][$item->jenis_makanan] ?? '';
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $item->paket }}</td>
                                                <td>{{ $item->waktu_makan }}</td>
                                                <td>{{ $item->nama_makanan }}</td>
                                                <td>{{ $item->jenis_makanan }}</td>
                                                <td>{{ $berat }}</td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $item->lemak }}</td>
                                                <td>{{ $item->energi }}</td>
                                            </tr>
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
                                        @foreach ($selingan as $item)
                                            <tr>
                                                <td>{{ $item->paket }}</td>
                                                <td>{{ $item->waktu_makan }}</td>
                                                <td>{{ $item->nama_selingan }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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
