<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'address', 'status'];

    
    public function bedroom()
    {
        return $this->hasMany(Bedroom::class, 'hotel_id');
    }

    public function guests()
    {
        return $this->hasMany(Guest::class, 'guest_id');
    }

    public function administrations()
    {
        return $this->hasMany(Administration::class);
    }
    
}
