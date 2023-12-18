<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administration extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'date_month_start', 'date_month_finish', 'water', 'internet', 'gas', 'electric_power', 'maintenance', 'other_amount', 'profit_total', 'profit_amount'];

    public function hotel(): BelongsTo {
         return $this->belongsTo(Hotel::class);
    }

    
}
