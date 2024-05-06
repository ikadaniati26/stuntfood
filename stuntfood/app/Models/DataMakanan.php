<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMakanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'idDataMakanan';
    public $timestamps = false;
    protected $table = "data_makanan";
    protected $fillable = ['iddatamakanan','waktu_makan','paket', 'nama_makanan', 'protein', 'karbohidrat', 'lemak', 'energi'];
}
