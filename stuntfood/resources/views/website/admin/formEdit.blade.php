@extends('website.main.index')

@section('content')

        <form action="{{ url('update', ['id'=>$data->idData_makanan]) }}" method="post">
            @csrf
            @method("Patch")
            <div class="container mt-3 mb-3">
                <div class="card mt-1  shadow" id="cardTemplate">
                    <div class="card-body">
                        <div class="form-group form-template ">
                            <h5 class="fw-bold">#Form Edit Data</h5>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                        <select class="form-control" name="waktu_makan">
                                            <option value="makanpagi" {{isset($data->waktu_makan) && $data->waktu_makan=="makan_pagi"? 'selected': ""}} >Makan Pagi</option>
                                            <option value="makansiang" {{isset($data->waktu_makan) && $data->waktu_makan=="makan_siang"? 'selected': ""}}>Makan Siang</option>
                                            <option value="makanmalam" {{isset($data->waktu_makan) && $data->waktu_makan=="makan_malam"? 'selected': ""}}>Makan Malam</option>
                                            <option value="selinganpagi" {{isset($data->waktu_makan) && $data->waktu_makan=="selingan_pagi"? 'selected': ""}}>Selingan Pagi</option>
                                            <option value="selingansore" {{isset($data->waktu_makan) && $data->waktu_makan=="selingan_sore"? 'selected': ""}}>Selingan Sore</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paket" class="form-label">Paket</label>
                                        <select class="form-control" name="paket">
                                            <option value="A" {{isset($data->paket) && $data->paket=="A"? 'selected': ""}}>Paket A</option>
                                            <option value="B" {{isset($data->paket) && $data->paket=="B"? 'selected': ""}}>Paket B</option>
                                            <option value="C" {{isset($data->paket) && $data->paket=="C"? 'selected': ""}}>Paket C</option>
                                            <option value="D" {{isset($data->paket) && $data->paket=="D"? 'selected': ""}}>Paket D</option>
                                            <option value="E" {{isset($data->paket) && $data->paket=="E"? 'selected': ""}}>Paket E</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_makanan" class="form-label">Nama Makanan</label>
                                        <input type="text" class="form-control" name="nama_makanan" value="{{isset($data->nama_makanan)?$data->nama_makanan : ""}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="protein" class="form-label">Protein</label>
                                        <input type="text" class="form-control" name="protein" value="{{isset($data->protein)?$data->protein : ""}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lemak" class="form-label">Lemak</label>
                                        <input type="text" class="form-control" name="lemak" value="{{isset($data->lemak)?$data->lemak : ""}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="karbohidrat" class="form-label">Karbohidrat</label>
                                        <input type="text" class="form-control" name="karbohidrat" value="{{isset($data->karbohidrat)?$data->karbohidrat: ""}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="energi" class="form-label">Energi</label>
                                        <input type="text" class="form-control" name="energi" value="{{isset($data->energi)?$data->energi : ""}}">
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol untuk menyalin form -->
            <div class="container d-flex  gap-2 mt-3 mx-4">
                <button type="submit" class="btn btn-success" id="submitButton" style="background-color: green">Simpan</button>
            </div>
    
        </form>
    
@endsection
