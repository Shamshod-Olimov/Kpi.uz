<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    use HasFactory;

    protected $table = 'informations';
    protected $fillable = [
        'leadership', 'department', 'section',
        'speciality', 'worker', 'done', 'executive_discipline',
        'initiative', 'extra', 'total', 'kpi_per'
    ];
}
