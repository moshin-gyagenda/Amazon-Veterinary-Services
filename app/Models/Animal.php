<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animals';

    
    protected $fillable = [
        'animal_type',
        'breed',
        'age',
        'spayed',
        'gender',
        'color_markings',
        'emergency_contact',
        'weight',
        'animal_code',
        'vaccination_history',
        'medical_history',
        'owner_info',
    ];

    public function diagnoses()
    {
        return $this->hasMany(Diagnosis::class, 'animal_code', 'animal_code');
    }
    
    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
