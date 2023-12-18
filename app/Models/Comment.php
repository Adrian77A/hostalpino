<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'title', 'email', 'status', 'description', 'date'];

    public function scopeStatus($query)
    {
        return $query->whereStatus('1')->orderBy('created_at');
    }
 

}
