<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_menu extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "sub_menu";
    protected $fillable = ['id', 'nama_makanan', 'jenis_makanan', 'protein', 'karbohidrat','lemak', 'energi','Data_makanan_idData_makanan '];
}
