@extends('website.main.index')

@section('content')
<div class="card mt-3 mb-5 mx-5">
    <div class="card-body">
        <h5 class="card-title">#Form Input Makan Pagi</h5>
        <form action="{{ route('prosesadmin') }}" method="post" id="dynamicForm">
            @csrf
            <div id="formContainer">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="waktu_makan" class="form-label">Waktu Makan</label>
                                <select class="form-control" name="waktu_makan[]">
                                    <option value="makan_pagi">Makan Pagi</option>
                                    <option value="makan_siang">Makan Siang</option>
                                    <option value="makan_malam">Makan Malam</option>
                                    <option value="selingan_pagi">Selingan Pagi</option>
                                    <option value="selingan_sore">Selingan Sore</option> 
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
                    
                    <button type="button" class="btn btn-danger removeForm btn-sm">
                        <i class="fas fa-times"></i> <!-- Ikon "x" dari Font Awesome -->
                    </button>
                    <hr>
                </div>
            </div>
            <button type="button" class="btn btn-success btn-sm" id="addForm">Tambah Form</button> 
            <button type="button" class="btn btn-primary btn-sm" id="submitForm">Submit</button> <!-- Ganti type dengan "button" -->
        </form>
    </div>
</div>

<!-- Tautkan Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Tambahkan form baru
        $("#addForm").click(function() {
            var newForm = $("#formContainer .form-group:first").clone();
            newForm.find('input, select').val(''); // Kosongkan nilai input
            $("#formContainer").append(newForm);
        });
    
        // Hapus form
        $(document).on("click", ".removeForm", function() {
            $(this).closest(".form-group").remove();
        });
    
        // Kirim formulir melalui AJAX
        $("#submitForm").click(function() {
            var formData = $("#dynamicForm").serialize(); // Mengambil data formulir dalam bentuk string
            $.ajax({
                type: "POST",
                url: "{{ route('prosesadmin') }}",
                data: formData,
                success: function(response) {
                    alert("Formulir berhasil disimpan!"); // Tampilkan pesan berhasil
                    // Kosongkan formulir
                    $("#formContainer").empty();
                    // Tambahkan kembali form kosong
                    $("#formContainer").append('<div class="form-group">...</div>');
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log error ke konsol
                    alert("Terjadi kesalahan, formulir gagal disimpan."); // Tampilkan pesan error
                }
            });
        });
    });
</script>

@endsection
