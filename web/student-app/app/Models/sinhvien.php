<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    protected $fillable = ['id', 'name', 'age', 'address', 'phone', 'id_monhoc', 'id_lop'];

}
