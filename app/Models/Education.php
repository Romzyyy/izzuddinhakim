<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $dates = ['start_date', 'end_date'];

    protected $fillable = [
        'degree',
        'university',
        'image',
        'graduation_date',
    ];
}
