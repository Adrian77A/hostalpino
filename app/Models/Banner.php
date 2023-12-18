<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'img', 'status', 'show', 'order'];

    protected $casts = [
        'show' => 'boolean',
    ];

    public function scopeStatus($query){

        return $query->where('status','Activo')->where('show', 1);
    }
    
}
