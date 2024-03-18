<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'cpf',
        'sex',
        'sus_card',
        'birthday',
        'phone',
        'address',
        'job_role_id',
        'admission',
        'ubs_id'
    ];

    public function ubs()
    {
        return $this->hasMany(Ubs::class);
    }

    public function job_role_id()
    {
        return $this->hasOne(JobRole::class);
    }
}
