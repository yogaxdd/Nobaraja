<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbnail',
        'judul',
        'rating',
        'tipe',
        'durasi',
        'kualitas',
        'genre',
        'trailer_link',
        'server_backup',
        'embed_link',
        'sinopsis',
        'tahun',
        'tanggal_rilis',
        'download_links',
    ];

    protected $casts = [
        'rating'         => 'decimal:1',
        'server_backup'  => 'array',
        'download_links' => 'array',
        'tanggal_rilis'  => 'date',
    ];
}
