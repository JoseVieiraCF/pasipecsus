<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'sus_card',
        'address',
        'sex',
        'hypertensive',
        'diabetic',
        'pregnant',
        'cancer',
        'phone',
        'ubs_id'
    ];

    public function ubs()
    {
        return $this->hasMany(Ubs::class);
    }
}
