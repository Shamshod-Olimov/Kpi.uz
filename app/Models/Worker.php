<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Worker extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'workers';
    protected $fillable = [
        'section_id', 'name', 'surname', 'status', 'speciality'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public $sortable = [
        'section_id', 'name', 'surname', 'status', 'speciality'
    ];
}
