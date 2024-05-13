@extends('website.main.index')

@section('content')
    <form action="{{ route('prosesadmin') }}" method="post">
        @csrf
        <div class="container mt-3 mb-3">

            @if(session("success"))
            <div class="alert alert-success">
              {{session("success")}}
            </div>
          @endif
          
            <div class="card mt-1  shadow" id="cardTemplate">
                <div class="card-body">
                    <div class="form-group form-template ">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold">#Form Input Data</h5>
                            <button type="button" class="btn btn-danger btn-sm removeForm"
                                style="width: 40px; height: 40px;"><i class="fas fa-times"
                                    style="color: rgb(255, 255, 255);"></i></button>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                    <select class="form-control" name="waktu_makan[]">
                                        <option value="makanpagi">Makan Pagi</option>
                                        <option value="makansiang">Makan Siang</option>
                                        <option value="makanmalam">Makan Malam</option>
                                        <option value="selinganpagi">Selingan Pagi</option>
                                        <option value="selingansore">Selingan Sore</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="paket" class="form-label">Paket</label>
                                    <select class="form-control" name="paket[]">
                                        <option value="A">Paket A</option>
                                        <option value="B">Paket B</option>
                                        <option value="C">Paket C</option>
                                        <option value="D">Paket D</option>
                                        <option value="E">Paket E</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_makanan" class="form-label">Nama Makanan</label>
                                    <input type="text" class="form-control" name="nama_makanan[]">
                                </div>
                                <div class="mb-3">
                                    <label for="protein" class="form-label">Protein</label>
                                    <input type="text" class="form-control" name="protein[]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lemak" class="form-label">Lemak</label>
                                    <input type="text" class="form-control" name="lemak[]">
                                </div>
                                <div class="mb-3">
                                    <label for="karbohidrat" class="form-label">Karbohidrat</label>
                                    <input type="text" class="form-control" name="karbohidrat[]">
                                </div>
                                <div class="mb-3">
                                    <label for="energi" class="form-label">Energi</label>
                                    <input type="text" class="form-control" name="energi[]">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Tombol untuk menyalin form -->
        <div class="container d-flex  gap-2 mt-3 mx-4">
            <button type="button" class="btn btn-primary " id="copyForm"
                style="background-color: blue">TambahForm</button>
            <button type="submit" class="btn btn-success" id="submitButton" style="background-color: green">Submit</button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formContainer = document.querySelector('.container');
            let formCount = 1;

            // Tambah form
            const copyFormButton = document.getElementById('copyForm');
            copyFormButton.addEventListener('click', function() {
                if (formCount < 10) {
                    const cardTemplate = document.getElementById('cardTemplate');
                    const newCard = cardTemplate.cloneNode(true);
                    newCard.removeAttribute('id'); // Hapus id untuk menghindari duplikasi

                    // Reset nilai input pada form baru
                    const inputs = newCard.querySelectorAll('input, select');
                    inputs.forEach(input => {
                        input.value = ''; // Reset nilai input
                    });

                    // Tambahkan form baru ke dalam container
                    formContainer.appendChild(newCard);

                    formCount++; // Tambahkan jumlah form yang sudah ditambahkan
                } else {
                    alert("Anda telah mencapai batas maksimal form.");
                }
            });

            // Hapus form
            $(document).on("click", ".removeForm", function() {
                $(this).closest(".card").remove();
                formCount--; // Kurangi jumlah form yang telah dihapus
            });
        });
    </script>
@endsection
