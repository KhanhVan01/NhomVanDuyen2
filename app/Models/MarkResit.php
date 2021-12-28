<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkResit extends Model
{
    use HasFactory;
    protected $table = 'mark_resit';
    public $timestamps = false;
    public $primaryKey = 'number';

    public function getFullNameAttribute()
    {
        return $this->lastName. " ".$this->middleName." ".$this->firstName;
    }
    // ds thi lại nếu điểm lần 1 dưới 5
    public function getNoteAttribute(){
        if($this->mark_final >=5 && $this->mark_skill <=5){
            return "Thi lại thực hành";
        } else if($this->mark_final <=5 && $this->mark_skill >=5){
            return "Thi lại lý thuyết";
        } else if($this->mark_final >=5 && $this->mark_skill >=5){
            return "Qua, xin chúc mừng";
        } else if($this->mark_final >=5 && $this->mark_skill == null){
            return "Qua, xin chúc mừng!";
        } else{
            return "Thi lại!";
        }
    }

}
