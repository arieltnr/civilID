<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Riset extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'judul',
        'hasil_riset',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'tgl_riset',
    ];

    protected $casts = [
        'tgl_riset' => 'date',
    ];

    public function getTglRisetIndoAttribute()
    {
        if (!$this->tgl_riset) {
            return null;
        }
        
        $months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];
        
        return $this->tgl_riset->format('d') . ' ' . 
               $months[$this->tgl_riset->format('n') - 1] . ' ' . 
               $this->tgl_riset->format('Y');
    }

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
