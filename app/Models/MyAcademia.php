<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyAcademia extends Model
{
    use HasFactory;

     protected $table = 'my_academias';

     protected $fillable = [
        'title',
        'gambar',
        'link_jurnal',
     ];
}
