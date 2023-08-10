<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagonosis extends Model
{
    use HasFactory;
    protected $table = 'diagonoses';

    protected $fillable = [
        'animal_code',
        'medical_history',
        'physical_exam_findings',
        'diagnostic_tests',
        'other_diagnostic_procedures',
        'assessment_diagnosis',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_code', 'animal_code'); 
    }
}
