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
        return $this->hasOne(Ubs::class);
    }

//    public function vaccine()
//    {
//        return $this->hasMany(Vaccines::class);
//    }
}
