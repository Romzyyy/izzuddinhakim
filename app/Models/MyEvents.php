<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MyEvents extends Model
{
    use HasFactory;
        
    protected $casts = [
        'tanggal' => 'date',  // Cast 'tanggal' as date
    ];

     protected $fillable = [
         'gambar',
         'title',
         'slug',
         'desc',
         'tanggal',
         'link',
         'organizer',
     ];

  public static function boot()
    {
        parent::boot();

        // Secara otomatis membuat slug dari title saat membuat blog
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
            // Menambahkan pengecekan untuk memastikan slug unik
            $originalSlug = $model->slug;
            $count = 2;
            while (self::where('slug', $model->slug)->exists()) {
                $model->slug = "{$originalSlug}-{$count}";
                $count++;
            }
        });

        // Secara otomatis memperbarui slug saat mengupdate title
        static::updating(function ($model) {
            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title);
                $originalSlug = $model->slug;
                $count = 2;
                while (self::where('slug', $model->slug)->where('id', '!=', $model->id)->exists()) {
                    $model->slug = "{$originalSlug}-{$count}";
                    $count++;
                }
            }
        });
    }
}
