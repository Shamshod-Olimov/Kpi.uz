<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Kpi extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'informations';

    protected $fillable = [
        'leadership', 'department', 'section',
        'speciality', 'worker', 'done', 'executive_discipline',
        'initiative', 'extra', 'total', 'kpi_per'
    ];
    
    public $sortable = [
        'id', 'leadership', 'department', 'section',
        'speciality', 'worker', 'done', 'executive_discipline',
        'initiative', 'extra', 'total', 'kpi_per', 'created_at', 'updated_at'
    ];
}
