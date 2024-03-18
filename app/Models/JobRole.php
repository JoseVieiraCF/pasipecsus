<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
