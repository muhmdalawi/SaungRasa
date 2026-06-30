<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'gambar',
        'nama_product',
        'kategori',
        'harga',
        'stok',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'stok' => 'integer',
        ];
    }

    public static function generateId(): string
    {
        $last = static::query()->orderByDesc('id_product')->value('id_product');
        $next = $last ? ((int) substr($last, 4)) + 1 : 1;

        return 'PRD-' . str_pad((string) $next, 3, '0', STR_PAD_LEFT);
    }
}
