<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Department extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'departments';
    protected $fillable = ['name', 'leadership_id'];

    public function leadership()
    {
        return $this->belongsToMany(Leadership::class);
    }

    public $sortable = [
        'name', 'leadership_id'
    ];

}
