<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tontine;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tontine_id',
        'payment_amount',
        'period',
        'reference'
    ];

    public function user()
    {
        return $this -> belongsTo(User::class);
    }

    public function tontine()
    {
        return $this -> belongsTo(Tontine::class);
    }

}
