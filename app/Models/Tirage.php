<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tontine;

class Tirage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tontine_id',
        'draw_number',
        'beneficiary_status',
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
