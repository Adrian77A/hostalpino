<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'body', 
        'status', 
        'img', 
        'video',
        'show_page'
    ];

    protected $casts = [
        'img' => 'array',
        'show_page' => 'boolean',
    ];
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}