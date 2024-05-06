@extends('website.main.index')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-0">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></span>#Kalkulator kebutuhan
                                kalori</h4>
                        </div>
                        <div class="card-body">
                            <form action='{{ route('proses') }}' method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Input Umur</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="{{ isset($komponen_input[0]) ? $komponen_input[0] : 'Umur' }}"
                                        name="umur" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1"
                                            value="laki-laki"
                                            {{ isset($komponen_input[1]) && $komponen_input[1] == 'laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2"
                                            value="perempuan"
                                            {{ isset($komponen_input[1]) && $komponen_input[1] == 'perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Berat Badan</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="{{ isset($komponen_input[2]) ? $komponen_input[2] : 'Berat Badan' }}"
                                        name="beratbadan" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname" type="null">Faktor
                                        Aktivitas</label>
                                    <select class="form-select" aria-label="Default select example" name="aktivitas">
                                        <option selected disabled>
                                            {{ isset($komponen_input[3]) ? $komponen_input[3] : 'Pilih Inputan' }}</option>
                                        <option value="bedrest">Bedrest</option>
                                        <option value="gerakterbatas">Bisa Bergerak Terbatas</option>
                                        <option value="bisajalan">Bisa Berjalan</option>
                                        <option value="normal">Aktivitas Normal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Faktor Stress</label>
                                    <select class="form-select" aria-label="Default select example" name="stress">
                                        <option selected disabled>
                                            {{ isset($komponen_input[4]) ? $komponen_input[4] : 'Pilih faktor stress' }}
                                        </option>
                                        <option value="null">tidak ada faktor stress</option>
                                        <option value="operasi">Operasi</option>
                                        <option value="trauma">Trauma</option>
                                        <option value="infeksi">Infeksi berat</option>
                                        <option value="peradangan">Peradangan/inflamasi saluran cerna selaput organ perut
                                        </option>
                                        <option value="patahtulang">Patah Tulang</option>
                                        <option value="infeksi">Infeksi dengan trauma</option>
                                        <option value="sepsis">sepsis</option>
                                        <option value="cederakepala">cedera kepala</option>
                                        <option value="kanker">kanker/Tumor</option>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light"></span>#Hasil Rekomendasi Menu
                                Makanan</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">BMR balita</label>
                                    <h5>{{ isset($nilaibmr) ? $nilaibmr : '-' }}</h5>
                                    <label class="form-label" for="basic-default-fullname">Total Kebutuhan kalori
                                        balita</label>
                                    <h5>{{ isset($tdee) ? $tdee : '-' }}</h5>
                                    <label class="form-label" for="basic-default-fullname">Distribusi kalori per waktu
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
                                    <h5>persentase isi piringku balita 2-5 tahun</h1>
                                    <h6>pada persentase isi piring dalam menyusun menu untuk balita 2-5 yaitu makanan pokok sebanyak 35%, lauk 35%, sayur 15% dan buah 15%</h6>
                                    <label class="form-label" for="basic-default-fullname">Makan Pagi</label>
                                    <div class="table-responsive text-nowrap me-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Makanan Pokok(35%)</th>
                                                    <th>Lauk(35%)</th>
                                                    <th>Sayur(15%)</th>
                                                    <th>Buah(15%)</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ isset($nilaiisipiring[0]) ? $nilaiisipiring[0] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[1]) ? $nilaiisipiring[1] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[2]) ? $nilaiisipiring[2] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[3]) ? $nilaiisipiring[3] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <label class="form-label" for="basic-default-fullname">Makan Siang</label>
                                    <div class="table-responsive text-nowrap me-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Makanan Pokok(35%)</th>
                                                    <th>Lauk(35%)</th>
                                                    <th>Sayur(15%)</th>
                                                    <th>Buah(15%)</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ isset($nilaiisipiring[4]) ? $nilaiisipiring[4] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[5]) ? $nilaiisipiring[5] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[6]) ? $nilaiisipiring[6] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[7]) ? $nilaiisipiring[7] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <label class="form-label" for="basic-default-fullname">Makan Malam</label>
                                    <div class="table-responsive text-nowrap me-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Makanan Pokok(35%)</th>
                                                    <th>Lauk(35%)</th>
                                                    <th>Sayur(15%)</th>
                                                    <th>Buah(15%)</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ isset($nilaiisipiring[8]) ? $nilaiisipiring[8] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[9]) ? $nilaiisipiring[9] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[10]) ? $nilaiisipiring[10] : '-' }}</td>
                                                    <td>{{ isset($nilaiisipiring[11]) ? $nilaiisipiring[11] : '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Menu yang
                                        direkomendasikan</label>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Paket</th>
                                                    <th>Makan pagi</th>
                                                    <th>Selingan pagi</th>
                                                    <th>Makan siang</th>
                                                    <th>Selingan sore</th>
                                                    <th>Makan malam</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>A</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>B</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>C</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>D</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>E</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                        <strong>F</strong>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
