<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Section extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'sections';
    protected $fillable = [
        'name', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public $sortable = [
        'name', 'department_id'
    ];
}
