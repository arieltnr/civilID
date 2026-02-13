<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Anggota extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_anggota',
        'nomorinduk',
        'jabatan',
        'foto',
        'status',
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            $imageFields = ['foto'];

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
