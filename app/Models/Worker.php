<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers';
    protected $fillable = [
        'section_id', 'name', 'surname', 'status', 'speciality'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
