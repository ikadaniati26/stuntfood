@extends('website.main.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action=""  method="POST">
        @method('PATCH')
        <div class="container mt-3 mb-3">
            {{-- form input pagi --}}
            <div class="card mt-1 mb-5 shadow" id="cardTemplate">
                <div class="card-body">
                    <div class="form-group form-template ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold">#Form Edit Menu Pagi</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label for="paket" class="form-label">Paket</label>

                                    <select class="form-control" name="paket">
                                        <option value="{{ $subMenu[0]->paket }}">{{ $subMenu[0]->paket }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                    <input type="text" class="form-control" value="{{ $subMenu[0]->waktu_makan }}"
                                        disabled>
                                    <input type="hidden" name="waktumakan_pagi" value="{{ $subMenu[0]->waktu_makan }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="menu" class="form-label">Menu</label>
                                    <input type="text" class="form-control" name="menu_pagi"
                                        value="{{ $subMenu[0]->menu }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- makanan pokok --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <label for="nama_makanan" class="form-label">Nama</label>
                                            <input type="text" class="form-control me-3" name="mp_pagi"
                                                value="{{ $subMenu[0]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[0]->jenis_makanan }}" disabled>
                                            <input type="hidden" value="#" name="j_mp">
                                        </div>
                                        <div class="me-2">
                                            <label for="protein" class="form-label">Protein</label>
                                            <input type="text" class="form-control me-3" name="proteinmp_pagi"
                                                value="{{ $subMenu[0]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">Karbohidrat</label>
                                            <input type="text" class="form-control" name="karbomp_pagi"
                                                value="{{ $subMenu[0]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">lemak</label>
                                            <input type="text" class="form-control" name="lemakmp_pagi"
                                                value="{{ $subMenu[0]->lemak }}">
                                        </div>
                                        <div class="">
                                            <label for="karbo" class="form-label">energi</label>
                                            <input type="text" class="form-control" name="energimp_pagi"
                                                value="{{ $subMenu[0]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- lauk --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="lauk_pagi"
                                                value="{{ $subMenu[1]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[1]->jenis_makanan }}" disabled>
                                            <input type="hidden" value="{{ $subMenu[1]->jenis_makanan }}" name="j_lauk">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinlauk_pagi"
                                                value="{{ $subMenu[1]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbolauk_pagi"
                                                value="{{ $subMenu[1]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaklauk_pagi"
                                                value="{{ $subMenu[1]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energilauk_pagi"
                                                value="{{ $subMenu[1]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- sayur --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="syr_pagi"
                                                value="{{ $subMenu[2]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[2]->jenis_makanan }}" disabled>
                                            <input type="hidden" value="{{ $subMenu[2]->jenis_makanan }}"
                                                name="j_sayur">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinsyr_pagi"
                                                value="{{ $subMenu[2]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbosyr_pagi"
                                                value="{{ $subMenu[2]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaksyr_pagi"
                                                value="{{ $subMenu[2]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energisyr_pagi"
                                                value="{{ $subMenu[2]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- buah --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="buah_pagi"
                                                value="{{ $subMenu[3]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[3]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="j_buah"
                                                value="{{ $subMenu[3]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinbuah_pagi"
                                                value="{{ $subMenu[3]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbobuah_pagi"
                                                value="{{ $subMenu[3]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemakbuah_pagi"
                                                value="{{ $subMenu[3]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energibuah_pagi"
                                                value="{{ $subMenu[3]->energi }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- form input siang --}}
            <div class="card mt-1 mb-5 shadow" id="cardTemplate">
                <div class="card-body">
                    <div class="form-group form-template ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold">#Form Edit Menu Siang</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                    <input type="text" class="form-control" value="{{ $subMenu[4]->waktu_makan }}"
                                        disabled>
                                    <input type="hidden" name="waktumakan_siang"
                                        value="{{ $subMenu[4]->waktu_makan }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_makanan" class="form-label">Menu</label>
                                    <input type="text" class="form-control" name="menu_siang"
                                        value="{{ $subMenu[4]->menu }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- makanan pokok --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <label for="nama_makanan" class="form-label">Nama makanan</label>
                                            <input type="text" class="form-control me-3" name="mp_siang"
                                                value="{{ $subMenu[4]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[4]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="jmp_siang"
                                                value="{{ $subMenu[4]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="protein" class="form-label">Protein</label>
                                            <input type="text" class="form-control me-3" name="proteinmp_siang"
                                                value="{{ $subMenu[4]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">Karbohidrat</label>
                                            <input type="text" class="form-control" name="karbomp_siang"
                                                value="{{ $subMenu[4]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">lemak</label>
                                            <input type="text" class="form-control" name="lemakmp_siang"
                                                value="{{ $subMenu[4]->lemak }}">
                                        </div>
                                        <div class="">
                                            <label for="karbo" class="form-label">energi</label>
                                            <input type="text" class="form-control" name="energimp_siang"
                                                value="{{ $subMenu[4]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- lauk --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="lauk_siang"
                                                value="{{ $subMenu[5]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[5]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="jlauk_siang"
                                                value="{{ $subMenu[5]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinlauk_siang"
                                                value="{{ $subMenu[5]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbolauk_siang"
                                                value="{{ $subMenu[5]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaklauk_siang"
                                                value="{{ $subMenu[5]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energilauk_siang"
                                                value="{{ $subMenu[5]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- sayur --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="syr_siang"
                                                value="{{ $subMenu[6]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[6]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="jsyr_siang"
                                                value="{{ $subMenu[6]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinsyr_siang"
                                                value="{{ $subMenu[6]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbosyr_siang"
                                                value="{{ $subMenu[6]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaksyr_siang"
                                                value="{{ $subMenu[6]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energisyr_siang"
                                                value="{{ $subMenu[6]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- buah --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="buah_siang"
                                                value="{{ $subMenu[7]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[7]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="j_buah"
                                                value="{{ $subMenu[7]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinbuah_siang"
                                                value="{{ $subMenu[7]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbobuah_siang"
                                                value="{{ $subMenu[7]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemakbuah_siang"
                                                value="{{ $subMenu[7]->karbohidrat }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energibuah_siang"
                                                value="{{ $subMenu[7]->energi }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- form input malam --}}
            <div class="card mt-1 mb-5 shadow" id="cardTemplate">
                <div class="card-body">
                    <div class="form-group form-template ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold">#Form Edit Menu Malam</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                    <input type="text" class="form-control" value="{{ $subMenu[8]->waktu_makan }}"
                                        disabled>
                                    <input type="hidden" name="waktumakan_malam" value="makan malam">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_makanan" class="form-label">Menu</label>
                                    <input type="text" class="form-control" name="menu_malam"
                                        value="{{ $subMenu[8]->menu }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                {{-- makanan pokok --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <label for="nama_makanan" class="form-label">Nama makanan</label>
                                            <input type="text" class="form-control me-3" name="mp_malam"
                                                value="{{ $subMenu[8]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[8]->jenis_makanan }}" disabled>
                                            <input type="hidden"
                                                value="{{ $subMenu[8]->jenis_makanan }}"name="jmp_malam">
                                        </div>
                                        <div class="me-2">
                                            <label for="protein" class="form-label">Protein</label>
                                            <input type="text" class="form-control me-3" name="proteinmp_malam"
                                                value="{{ $subMenu[8]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">Karbohidrat</label>
                                            <input type="text" class="form-control" name="karbomp_malam"
                                                value="{{ $subMenu[8]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <label for="karbo" class="form-label">lemak</label>
                                            <input type="text" class="form-control" name="lemakmp_malam"
                                                value="{{ $subMenu[8]->lemak }}">
                                        </div>
                                        <div class="">
                                            <label for="karbo" class="form-label">energi</label>
                                            <input type="text" class="form-control" name="energimp_malam"
                                                value="{{ $subMenu[8]->energi }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- lauk --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="lauk_malam"
                                                value="{{ $subMenu[9]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[9]->jenis_makanan }}" disabled>
                                            <input type="hidden" name="laukpagi"
                                                value="{{ $subMenu[9]->jenis_makanan }}" name="jlauk_malam">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinlauk_malam"
                                                value="{{ $subMenu[9]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbolauk_malam"
                                                value="{{ $subMenu[9]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaklauk_malam"
                                                value="{{ $subMenu[9]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energilauk_malam"
                                                value="{{ $subMenu[9]->energi }}">
                                        </div>
                                        <div class="">
                                            <input type="hidden" name="iddatamakanan">
                                        </div>
                                    </div>
                                </div>
                                {{-- sayur --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="syr_malam"
                                                value="{{ $subMenu[10]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[10]->jenis_makanan }}" disabled>
                                            <input type="hidden" value="sayur" name="jsyr_malam"
                                                value="{{ $subMenu[10]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinsyr_malam"
                                                value="{{ $subMenu[9]->protein }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbosyr_malam"
                                                value="{{ $subMenu[10]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemaksyr_malam"
                                                value="{{ $subMenu[10]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energisyr_malam"
                                                value="{{ $subMenu[10]->energi }}">
                                        </div>
                                        <div class="">
                                            <input type="hidden" name="iddatamakanan">
                                        </div>
                                    </div>
                                </div>
                                {{-- buah --}}
                                <div class="mb-3">
                                    <div class="d-flex justify-content-around">
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="buah_malam"
                                                value="{{ $subMenu[11]->nama_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3"
                                                value="{{ $subMenu[11]->jenis_makanan }}" disabled>
                                            <input type="hidden" value="{{ $subMenu[11]->jenis_makanan }}"
                                                name="j_buah">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control me-3" name="proteinbuah_malam"
                                                value="{{ $subMenu[11]->jenis_makanan }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="karbobuah_malam"
                                                value="{{ $subMenu[11]->karbohidrat }}">
                                        </div>
                                        <div class="me-2">
                                            <input type="text" class="form-control" name="lemakbuah_malam"
                                                value="{{ $subMenu[11]->lemak }}">
                                        </div>
                                        <div class="">
                                            <input type="text" class="form-control" name="energibuah_malam"
                                                value="{{ $subMenu[11]->energi }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($selingan as $item)
                @if ($item->waktu_makan == 'selingan pagi')
                    {{-- form input selingan pagi --}}
                    <div class="card mt-1 mb-5 shadow" id="cardTemplate">
                        <div class="card-body">
                            <div class="form-group form-template ">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold">#Form Edit Selingan pagi</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="waktu_makan" class="form-label">Waktu Selingan</label>
                                            <input type="text" class="form-control" value="selingan pagi" disabled>
                                            <input type="hidden" name="waktumakan_SPagi" value="selingan pagi">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="nama_makanan" class="form-label">Menu</label>
                                            <input type="text" class="form-control" name="menuselingan_pagi"
                                                value="{{ $item->menu }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-around">
                                                <div class="me-2">
                                                    <label for="protein" class="form-label">Protein</label>
                                                    <input type="text" class="form-control me-3"
                                                        name="proteinselingan_pagi" value="{{ $item->protein }}">
                                                </div>
                                                <div class="me-2">
                                                    <label for="karbo" class="form-label">Karbohidrat</label>
                                                    <input type="text" class="form-control" name="karboselingan_pagi"
                                                        value="{{ $item->karbohidrat }}">
                                                </div>
                                                <div class="me-2">
                                                    <label for="karbo" class="form-label">lemak</label>
                                                    <input type="text" class="form-control" name="lemakselingan_pagi"
                                                        value="{{ $item->lemak }}">
                                                </div>
                                                <div class="">
                                                    <label for="karbo" class="form-label">energi</label>
                                                    <input type="text" class="form-control" name="energiselingan_pagi"
                                                        value="{{ $item->energi }}">
                                                </div>
                                                <div class="">
                                                    <input type="hidden" name="iddatamakanan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($item->waktu_makan == 'selingan sore')
                    {{-- form input selingan sore --}}
                    <div class="card mt-1 mb-5 shadow" id="cardTemplate">
                        <div class="card-body">
                            <div class="form-group form-template ">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold">#Form Edit Selingan Sore</h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="waktu_makan" class="form-label">Waktu Sore</label>
                                            <input type="text" class="form-control" value="{{ $item->waktu_makan }}"
                                                disabled>
                                            <input type="hidden" name="waktumkn_Ssore"
                                                value="{{ $item->waktu_makan }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="nama_makanan" class="form-label">Menu</label>
                                            <input type="text" class="form-control" name="menuselingan_sore"
                                                value="{{ $item->menu }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-around">
                                                <div class="me-2">
                                                    <label for="protein" class="form-label">Protein</label>
                                                    <input type="text" class="form-control me-3"
                                                        name="proteinselingan_sore" value="{{ $item->protein }}">
                                                </div>
                                                <div class="me-2">
                                                    <label for="karbo" class="form-label">Karbohidrat</label>
                                                    <input type="text" class="form-control" name="karboselingan_sore"
                                                        value="{{ $item->karbohidrat }}">
                                                </div>
                                                <div class="me-2">
                                                    <label for="karbo" class="form-label">lemak</label>
                                                    <input type="text" class="form-control" name="lemakselingan_sore"
                                                        value="{{ $item->lemak }}">
                                                </div>
                                                <div class="">
                                                    <label for="karbo" class="form-label">energi</label>
                                                    <input type="text" class="form-control" name="energiselingan_sore"
                                                        value="{{ $item->energi }}">
                                                </div>
                                                <div class="">
                                                    <input type="hidden" name="iddatamakanan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Tombol untuk menyalin form -->
        <div class="container d-flex  gap-2 mt-3 mx-4">
            <button type="submit" class="btn btn-success" id="submitButton"
                style="background-color: green">Simpan</button>
        </div>

    </form>
@endsection
