<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'price', 'description', 'date', 'creditos'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
