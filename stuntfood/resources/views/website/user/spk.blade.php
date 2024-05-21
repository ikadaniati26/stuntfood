@extends('website.main.index')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col ">
                    <div class="alert alert-success" role="alert">
                        <div class="text-modal-container">
                            <h5 style="color: rgb(100, 100, 4)">
                                "Allert Orang Tua:" <a href="#" class="alert-link"
                                    style="color: rgb(139, 130, 4)">Informasi Penting Tentang Aplikasi Balita</a>
                                <!-- Button ModalScrollable -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable">
                                    Klik Disini
                                </button>
                                <div class="col-lg-4 col-md-3">
                                    <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalScrollableTitle">#Informasi Aplikasi
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="fw-bold">Pengguna adalah balita usia:</p>
                                                    <p>2-5 Tahun (ini disesuaikan dengan penyusunan menu dengan konsep isi
                                                        piring balita usia 2-5 tahun)</p>
                                                    <p class="fw-bold">Faktor Aktivitas Balita</p>
                                                    <p>
                                                    <ul>
                                                        <li>Bedrest : Istirahat ditempat tidur untuk pemulihan kesehatan
                                                        </li>
                                                        <li>Bisa Bergerak Terbatas: Balita memiliki cedera/kondisi medis
                                                            tertentu yang membatasi gerakan tubuh</li>
                                                        <li>Bisa Berjalan : Balita sudah bisa berjalan meskipun belum bisa
                                                            berlari dan bermain cepat</li>
                                                        <li>Aktivitas Normal : Balita memiliki kemampuan untuk berjalan,
                                                            berlari dan bermain dengan cukup aktif</li>
                                                    </ul>
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </h5>
                    </div>

                    <div class="card mb-0  shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold py-1 mb-0"><span class="text-muted fw-bolder"></span>#Kalkulator kebutuhan
                                kalori
                            </h5>
                        </div>

                        <div class="card-body">
                            <form action='{{ route('proses') }}' method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Input Umur</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                            placeholder="{{ isset($komponen_input[0]) ? $komponen_input[0] : 'Umur' }}"
                                            name="umur" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk"
                                                id="flexRadioDefault1" value="laki-laki"
                                                {{ isset($komponen_input[1]) && $komponen_input[1] == 'laki-laki' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk"
                                                id="flexRadioDefault2" value="perempuan"
                                                {{ isset($komponen_input[1]) && $komponen_input[1] == 'perempuan' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Berat Badan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="basic-default-fullname"
                                            placeholder="{{ isset($komponen_input[2]) ? $komponen_input[2] : 'Berat Badan' }}"
                                            name="beratbadan" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname"
                                        type="null">Faktor Aktivitas</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="aktivitas">
                                            <option selected disabled>
                                                {{ isset($komponen_input[3]) ? $komponen_input[3] : 'Pilih Inputan' }}
                                            </option>
                                            <option value="bedrest">Bedrest</option>
                                            <option value="gerakterbatas">Bisa Bergerak Terbatas</option>
                                            <option value="bisajalan">Bisa Berjalan</option>
                                            <option value="normal">Aktivitas Normal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Faktor
                                        Stress</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="stress">
                                            <option selected disabled>
                                                {{ isset($komponen_input[4]) ? $komponen_input[4] : 'Pilih faktor stress' }}
                                            </option>
                                            <option value="tidakada">tidak ada faktor stress</option>
                                            <option value="operasi">Operasi</option>
                                            <option value="trauma">Trauma</option>
                                            <option value="infeksi">Infeksi berat</option>
                                            <option value="peradangan">Peradangan/inflamasi saluran cerna selaput organ
                                                perut</option>
                                            <option value="patahtulang">Patah Tulang</option>
                                            <option value="infeksi dengan trauma">Infeksi dengan trauma</option>
                                            <option value="sepsis">sepsis</option>
                                            <option value="cederakepala">cedera kepala</option>
                                            <option value="kanker">kanker/Tumor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: blue">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col">
                    <div class="card mb-4  shadow">
                        <div class="card-header  d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold py-1 mb-0"><span class="text-muted fw-light"></span>#Kebutuhan Kalori</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label fw-bold" for="basic-default-fullname">BMR balita</label> <br>
                                    <h3><span
                                            class="badge bg-label-primary me-3">{{ isset($nilaibmr) ? $nilaibmr : '-' }}</span>
                                    </h3>
                                    {{-- <h3>{{ isset($nilaibmr) ? $nilaibmr : '-' }}</h3> --}}

                                    <label class="form-label fw-bold" for="basic-default-fullname">Total Kebutuhan kalori
                                        balita</label>
                                    <h3><span class="badge bg-label-warning me-3">{{ isset($tdee) ? $tdee : '-' }}</span>
                                    </h3>
                                    {{-- <h3>{{ isset($tdee) ? $tdee : '-' }}</h3> --}}
                                    <label class="form-label fw-bold" for="basic-default-fullname">Distribusi kalori per
                                        waktu
                                        makan</label>
                                    <div class="table-responsive text-nowrap me-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>makan pagi</th>
                                                    <th>selingan pagi</th>
                                                    <th>makan siang</th>
                                                    <th>selingan sore</th>
                                                    <th>makan malam</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ isset($nilaiWaktu[0]) ? $nilaiWaktu[0] : '-' }}</td>
                                                    <td>{{ isset($nilaiWaktu[1]) ? $nilaiWaktu[1] : '-' }}</td>
                                                    <td>{{ isset($nilaiWaktu[2]) ? $nilaiWaktu[2] : '-' }}</td>
                                                    <td>{{ isset($nilaiWaktu[3]) ? $nilaiWaktu[3] : '-' }}</td>
                                                    <td>{{ isset($nilaiWaktu[4]) ? $nilaiWaktu[4] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <hr>
                                    <h5 class="fw-bold py-1 mb-0"><span class="text-muted fw-light"></span>#Persentase isi
                                        piring balita 2-5 tahun</h5>
                                    <h6>pada persentase isi piring dalam menyusun menu untuk balita 2-5 yaitu makanan pokok
                                        sebanyak 35%, lauk 35%, sayur 15% dan buah 15%</h6>

                                    <!-- Small table -->

                                    <div class="card">

                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr class="">
                                                        <th>Jadwal Makan</th>
                                                        <th>Makanan Pokok (kkal)</th>
                                                        <th>Lauk (kkal)</th>
                                                        <th>Sayur (kkal)</th>
                                                        <th>Buah(kkal)</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>Makan
                                                                Pagi</strong></td>
                                                        <td>{{ isset($nilaiisipiring[0]) ? $nilaiisipiring[0] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[1]) ? $nilaiisipiring[1] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[2]) ? $nilaiisipiring[2] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[3]) ? $nilaiisipiring[3] : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>Makan
                                                                Siang</strong></td>
                                                        <td>{{ isset($nilaiisipiring[4]) ? $nilaiisipiring[4] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[5]) ? $nilaiisipiring[5] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[6]) ? $nilaiisipiring[6] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[7]) ? $nilaiisipiring[7] : '-' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>Makan
                                                                Malam</strong></td>
                                                        <td>{{ isset($nilaiisipiring[8]) ? $nilaiisipiring[8] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[9]) ? $nilaiisipiring[9] : '-' }}</td>
                                                        <td>{{ isset($nilaiisipiring[10]) ? $nilaiisipiring[10] : '-' }}
                                                        </td>
                                                        <td>{{ isset($nilaiisipiring[11]) ? $nilaiisipiring[11] : '-' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--/ Small table -->

                                </div>

                            </form>
                        </div>
                        <div class="card-header  d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold py-1 mb-0"><span class="text-muted fw-light"></span>#TABEL BERAT MENU </h5>
                        </div>


                        <div class="table-responsive text-nowrap mx-5 mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Paket</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-1">
                                    @php
                                        $paketGroups = []; // Inisialisasi array untuk mengelompokkan paket-paket
                                    @endphp

                                    {{-- Mengelompokkan paket-paket --}}
                                    @foreach ($query as $item)
                                        @php
                                            $paketName = $item->paket;
                                            if (!isset($paketGroups[$paketName])) {
                                                $paketGroups[$paketName] = [];
                                            }
                                            $paketGroups[$paketName][] = $item;
                                        @endphp
                                    @endforeach

                                    {{-- Menampilkan satu baris untuk setiap paket --}}
                                     @foreach ($paketGroups as $paketName => $paketItems)
                                        <tr>
                                            <td>{{ $paketName }}</td>
                                            <td>
                                                <a href="{{ route('detail_paket', ['paket_name' => $paketName]) }}" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#paketModal{{ $loop->iteration }}">
                                                    <i class="fa-solid fa-eye"></i> 
                                                </a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="paketModal{{ $loop->iteration }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="paketModal{{ $loop->iteration }}Label"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="paketModal{{ $loop->iteration }}Label">
                                                                    {{ $paketName }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Menampilkan detail dari setiap item dalam paket
                                                                <ul>
                                                                    @foreach ($paketItems as $paketItem)
                                                                        <li>{{ $paketItem->nama_menu }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach 
                                    

                                </tbody>
                            </table>

                            {{-- <table class="table table-striped">
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
                                        $currentPaket = null;
                                        $currentWaktu = null;
                                    @endphp
                                    @foreach ($submenu as $index => $item)
                                        @if ($item->paket != $currentPaket)
                                            @php
                                                $currentPaket = $item->paket;
                                                $rowspanPaket = $submenu->where('paket', $currentPaket)->count();
                                            @endphp
                                            @foreach ($submenu->where('paket', $currentPaket) as $subitem)
                                                @if ($loop->first)
                                                    <tr>
                                                        <td rowspan="{{ $rowspanPaket }}">{{ $currentPaket }}</td>
                                                @endif
                                                @if ($subitem->waktu_makan != $currentWaktu)
                                                    @php
                                                        $currentWaktu = $subitem->waktu_makan;
                                                        $rowspanWaktu = $submenu->where('paket', $currentPaket)->where('waktu_makan', $currentWaktu)->count();
                                                    @endphp
                                                    <td rowspan="{{ $rowspanWaktu }}">{{ $currentWaktu }}</td>
                                                    <td>{{ $subitem->nama_makanan }}</td>
                                                    <td>{{ $subitem->jenis_makanan }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    @if ($loop->last)
                                                        </tr>
                                                    @endif
                                                @else
                                                    <tr>
                                                        <td>{{ $subitem->nama_makanan }}</td>
                                                        <td>{{ $subitem->jenis_makanan }}</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        @if ($loop->last)
                                                            </tr>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </tbody>
                            </table> --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
