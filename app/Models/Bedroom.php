<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bedroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'status', 'pay', 'hotel_id', 'img', 'show_page', 'web_phrase'];

    protected $casts = [
        'img' => 'array',
        'show_page' => 'boolean',
    ];


    public function guests()
    {
        return $this->hasMany(Guest::class, 'guest_id');
    }


    public function hotel(): BelongsTo{
        return $this->belongsTo(Hotel::class);
    }
    
}
