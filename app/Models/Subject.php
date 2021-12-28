<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    public $timestamps = false;
    public $primaryKey = 'subjectCode';
    public $incrementing = 'false';
    public $keyType = 'string';
    protected $fillable = [
        'subjectCode',
        'nameSubject',
        'totalClassHour',
        'final',
        'skill',
        'startDate',
    ];

    public function getNameFinalAttribute()
    {
        if ($this->final==1){
            return "";
        }
    }

    public function getNameSkillAttribute()
    {
        if ($this->skill==1){
            return "";
        }
    }

}
