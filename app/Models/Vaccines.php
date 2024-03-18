<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccines extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'patient_id',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
