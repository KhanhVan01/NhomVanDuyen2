<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    public $timestamps = false;
    public $primaryKey = 'courseCode';
    public $incrementing = 'false';
    public $keyType = 'string';
    protected $fillable = [
        'courseCode',
        'nameCourse',
    ];
}
