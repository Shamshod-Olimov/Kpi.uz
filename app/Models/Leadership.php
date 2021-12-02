<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Department;
use App\Models\Section;
use App\Models\Worker;

class Leadership extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'leaderships';
    protected $fillable = ['name'];


    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }

    public $sortable = ['name'];

}
