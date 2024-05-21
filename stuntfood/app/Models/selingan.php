<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class selingan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "selingan";
    protected $fillable = ['id', 'nama_selingan', 'protein', 'karbohidrat', 'lemak', 'energi', 'Data_makanan_idData_makanan'];
}
