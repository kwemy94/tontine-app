<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paiement;
use App\Models\Tirage;

class Tontine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_tontine',
        'cycle',
        'start_date',
        'end_date',
        'order_of_passage',
        'amount_tontine'
    ];

    public function paiements()
    {
        return $this -> hasMany(Paiement::class);
    }

    public function tirages()
    {
        return $this -> hasMany(Tirage::class);
    }

}


