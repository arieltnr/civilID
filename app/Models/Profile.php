<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_profil',
        'alamat_profil',
        'nama_kontak_profil',
        'no_kontak_profil',
        'latar_belakang',
        'tujuan',
        'visi_misi',
        'motto',
        'tahun',
        'logo',
        'banner',
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            $imageFields = ['logo', 'banner'];

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
