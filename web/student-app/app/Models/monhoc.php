<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monhoc extends Model
{
    use HasFactory;
    protected $table = 'monhoc';
    protected $fillable = ['nameSub'];
}
