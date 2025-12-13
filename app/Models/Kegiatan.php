<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kegiatan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_kegiatan',
        'isi_kegiatan',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'tgl_kegiatan',
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            $imageFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4'];

            foreach ($imageFields as $field) {
                if (!empty($model->$field)) {
                    $filePath = $model->$field; // Nama file saja
                    if (Storage::disk('public')->exists($filePath)) {
                        Storage::disk('public')->delete($filePath);
                    }
                }
            }
        });
    }
}
