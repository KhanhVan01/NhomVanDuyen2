<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grade';
    public $timestamps = false;
    public $primaryKey = 'classCode';
    public $incrementing ='false';
    public $keyType = 'string';
    protected $fillable = [
        'classCode',
        'nameClass',
        'courseCode',
        'majorCode',
    ];
    public function getFullGradeAttribute(){
        return $this->nameClass.$this->courseCode;
    }
    public function getFullNameAttribute()
    {
        return $this->lastName. " ".$this->middleName." ".$this->firstName;
    }
}
