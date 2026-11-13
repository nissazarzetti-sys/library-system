<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}