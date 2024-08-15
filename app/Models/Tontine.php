<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tontine extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function paiements()
    {
        return $this->hasMany(Payment::class);
    }

    public function tirages()
    {
        return $this->hasMany(Tirage::class);
    }

}


