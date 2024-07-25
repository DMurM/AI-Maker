<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'password', 'name', 'lastname', 'credit', 'plan_id'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
