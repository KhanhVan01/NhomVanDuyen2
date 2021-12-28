<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    public $timestamps = false;
    public $primaryKey = 'studentCode';
    public $incrementing = 'false';
    public $keyType = 'string';
 
    protected $fillable = [
        'studentCode','email','passWord','firstName','middleName','lastName','dateOfBirth','genDer','phone','address','dateEnrollment','classCode'
    ];
    
    public function getFullGradeAttribute()
    {
        return $this->nameClass . $this->courseCode;
    }

    public function getFullNameAttribute()
    {
        return $this->lastName. " ".$this->middleName." ".$this->firstName;
    }

    public function getNameGenderAttribute()
    {
        if ($this-> genDer ==1){
            return "Nam";
        }else{
            return "Nữ";
        }
    }
   


}
