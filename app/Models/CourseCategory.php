<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'course_categories';

    public static $searchable = [
        'category_name',
       
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function courseCategoryCourses()
    {
        return $this->hasMany(Course::class, 'course_category_id', 'id');
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
