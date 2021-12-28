<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semester';
    public $timestamps = false;
    public $primaryKey = 'semesterCode';
    public $incrementing = 'false';
    public $keyType = 'string';

    public function getFullSemesterAttribute()
    {
        return $this->nameSemester."/".$this->year1."-".$this->year2;
    }
}
