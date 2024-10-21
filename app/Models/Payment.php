<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    /**
     * Enregistrer le nom de l'utilisateur connecté
     * effectuant le paiement
     * @return void
     */
    protected static function boot(){
        Parent::boot();
        static::creating(function($payment){
            $payment->user_created = Auth::user()->name;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tontine()
    {
        return $this->belongsTo(Tontine::class);
    }

}
