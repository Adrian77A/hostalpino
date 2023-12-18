<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'suburb', 
        'city', 
        'state',
        'rfc',
        'lada_phone_one',
        'phone_one',
        'lada_phone_two',
        'phone_two', 
        'clabe_bank',
        'date_bank',
        'status',
        'postal_code'
    ];

}
