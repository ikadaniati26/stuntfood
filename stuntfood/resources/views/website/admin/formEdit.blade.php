@extends('website.main.index')

@section('content')
<div class="card mt-3 mb-5 mx-5">
    <div class="card-body">
        <h5 class="card-title">#Edit Data Makanan</h5>
        <form action="{{ route('updateadmin', $data->idDataMakanan) }}" method="post">
            @csrf
            @method('POST') <!-- Menggunakan method POST untuk update -->

            <div class="mb-3">
                <label for="waktu_makan" class="form-label">Waktu Makan</label>
                <select class="form-control" name="waktu_makan">
                    <option value="makan_pagi" {{ $dataMakanan->waktu_makan == 'makan_pagi' ? 'selected' : '' }}>Makan Pagi</option>
                    <option value="makan_siang" {{ $dataMakanan->waktu_makan == 'makan_siang' ? 'selected' : '' }}>Makan Siang</option>
                    <option value="makan_malam" {{ $dataMakanan->waktu_makan == 'makan_malam' ? 'selected' : '' }}>Makan Malam</option>
                    <option value="selingan_pagi" {{ $dataMakanan->waktu_makan == 'selingan_pagi' ? 'selected' : '' }}>Selingan Pagi</option>
                    <option value="selingan_sore" {{ $dataMakanan->waktu_makan == 'selingan_sore' ? 'selected' : '' }}>Selingan Sore</option> 
                </select>
            </div>
            <div class="mb-3">
                <label for="paket" class="form-label">Paket</label>
                <select class="form-control" name="paket">
                    <option value="A" {{ $dataMakanan->paket == 'A' ? 'selected' : '' }}>Paket A</option>
                    <option value="B" {{ $dataMakanan->paket == 'B' ? 'selected' : '' }}>Paket B</option>
                    <option value="C" {{ $dataMakanan->paket == 'C' ? 'selected' : '' }}>Paket C</option>
                    <option value="D" {{ $dataMakanan->paket == 'D' ? 'selected' : '' }}>Paket D</option>
                    <option value="E" {{ $dataMakanan->paket == 'E' ? 'selected' : '' }}>Paket E</option> 
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" name="nama_makanan" value="{{isset($data->nama_makanan)? $data->nama_makanan:''}}";>
            </div>
            <div class="mb-3">
                <label for="protein" class="form-label">Protein</label>
                <input type="text" class="form-control" name="protein" value="{{ $dataMakanan->protein }}">
            </div>
            <div class="mb-3">
                <label for="lemak" class="form-label">Lemak</label>
                <input type="text" class="form-control" name="lemak" value="{{ $dataMakanan->lemak }}">
            </div>
            <div class="mb-3">
                <label for="karbohidrat" class="form-label">Karbohidrat</label>
                <input type="text" class="form-control" name="karbohidrat" value="{{ $dataMakanan->karbohidrat }}">
            </div>
            <div class="mb-3">
                <label for="energi" class="form-label">Energi</label>
                <input type="text" class="form-control" name="energi" value="{{ $dataMakanan->energi }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
