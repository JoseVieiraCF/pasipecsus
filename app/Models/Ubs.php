<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cod',
        'responsible',
        'address'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
