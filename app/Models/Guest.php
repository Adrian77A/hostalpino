<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hotel_id','email', 'phone', 'phone_alternative', 'job','status', 'bedroom_id', 'date_start', 'date_log_start', 'date_log_finish', 'photo_agreement'];
    

    public function bedroom(): BelongsTo{
        return $this->belongsTo(Bedroom::class);
    }

    public function hotel(): BelongsTo{
        return $this->belongsTo(Hotel::class);
    }

}
