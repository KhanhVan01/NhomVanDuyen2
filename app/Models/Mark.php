<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Float_;

class Mark extends Model
{
    use HasFactory;
    protected $table = 'mark';
    public $timestamps = false;
    public $primaryKey = 'number';
    protected $fillable = [
        'number',
        'studentCode',
        'subjectCode',
        'mark_final',
        'mark_skill',
        'mark_final_resit',
        'mark_skill_resit',
    ];

    public function getFullNameAttribute()
    {
        return $this->lastName . " " . $this->middleName . " " . $this->firstName;
    }

    // public function getNoteAttribute(){
    //     if($this->mark_final >=5 && $this->mark_skill <=5){
    //         return "Thi lại thực hành";
    //     }else if($this->mark_final <=5 && $this->mark_skill >=5){
    //         return "Thi lại lý thuyết";
    //     }else if($this->mark_final >=5 && $this->mark_skill >=5 ){
    //         return "Qua, xin chúc mừng!";
    //     }else if($this->mark_final >=5 && $this->mark_skill == Null){
    //         return "Qua, xin chúc mừng!";
    //     }else{
    //         return "Thi lại!";
    //     }
    // }

    public function getMarkFinal1Attribute()
    {
        if ($this->mark_final != "") {
            if ($this->mark_final >= 5) {
                $total = $this->mark_final;
            } else {
                $total = ($this->mark_final + $this->mark_final_resit) / 2;
            }
        } else {
            $total = "";
        }

        if ($this->mark_final == "" && $this->mark_final_resit != "") {
            if ($this->mark_final_resit >= 5) {
                $total = $this->mark_final_resit;
            }
        }
        return $total;
    }

    public function getMarkSkill1Attribute()
    {
        if ($this->mark_skill != "") {
            if ($this->mark_skill >= 5) {
                $total = $this->mark_skill;
            } else {
                $total = ($this->mark_skill + $this->mark_skill_resit) / 2;
            }
        } else {
            $total = "";
        }

        if ($this->mark_skill == "" && $this->mark_skill_resit != "") {
            if ($this->mark_skill_resit >= 5) {
                $total = $this->mark_skill_resit;
            }
        }
        return $total;
    }
    public function getTB1Attribute()
    {
        //LT
        if ($this->mark_final != null) {
            if ($this->mark_final >= 5) {
                $A = $this->mark_final;
            } else {
                $A = ($this->mark_final + $this->mark_final_resit) / 2;
            }
        } else {
            $A = null;
        }
        if ($this->mark_final == null && $this->mark_final_resit != null) {
            if ($this->mark_final_resit >= 5) {
                $A = $this->mark_final_resit;
            }
        }
        //TH
        if ($this->mark_skill != null) {
            if ($this->mark_skill >= 5) {
                $B = $this->mark_skill;
            } else {
                $B = ($this->mark_skill + $this->mark_skill_resit) / 2;
            }
        } else {
            $B = null;
        }

        if ($this->mark_skill == null && $this->mark_skill_resit != null) {
            if ($this->mark_skill_resit >= 5) {
                $B = $this->mark_skill_resit;
            }
        }

        return ($A + $B) / 2;

        //thi LT không thi TH
        if ($this->mark_skill == null && $this->mark_skill_resit == null) {
            if ($this->mark_final != null) {
                if ($this->mark_final >= 5) {
                    $A = $this->mark_final;
                } else {
                    $A = ($this->mark_final + $this->mark_final_resit) / 2;
                }
            } else {
                $A = $this->mark_final_resit;
            }
            return $A;
        }

        //     //thi TH không thi LT
        if ($this->mark_final == null && $this->mark_final_resit == null) {
            if ($this->mark_skill != null) {
                if ($this->mark_skill >= 5) {
                    $B = $this->mark_skill;
                } else {
                    $B = ($this->mark_skill + $this->mark_skill_resit) / 2;
                }
            } else {
                $B = $this->mark_skill_resit;
            }
            return $B;
        }
    }


    public function getTBAttribute()
    {
        //đc thi lần 1 và có thể thi lần 2 nếu trượt lần 1
        if ($this->mark_final != null && $this->mark_skill != null) {
            if ($this->mark_final >= 5) {
                $A = $this->mark_final;
            } else {
                $A = ($this->mark_final + $this->mark_final_resit) / 2;
            }

            if ($this->mark_skill >= 5) {
                $B = $this->mark_skill;
            } else {
                $B = ($this->mark_skill + $this->mark_skill_resit) / 2;
            }
            return ($A + $B) / 2;
        }

        //bỏ thi LT, chỉ thi TH và thi lại LT
        if($this->mark_final == null && $this->mark_skill != null && $this->mark_final_resit != null && $this->mark_skill_resit == null){
            if($this->mark_skill>=5){
                $B = $this->mark_skill;
            }

            if($this->mark_final_resit>=5){
                $A = $this->mark_final_resit;
            }
            return ($A+$B)/2;
        }

        //thi LT, bỏ TH và thi lại TH
        if($this->mark_final != null && $this->mark_skill == null && $this->mark_final_resit == null && $this->mark_skill_resit != null){
            if($this->mark_skill_resit>=5){
                $B = $this->mark_skill_resit;
            }

            if($this->mark_final>=5){
                $A = $this->mark_final;
            }
            return ($A+$B)/2;
        }


        //cấm thi lần 1 và thi lần 2 (cả 2 bài)
        if ($this->mark_final == null && $this->mark_skill == null && $this->mark_final_resit != null && $this->mark_skill_resit != null) {
            if ($this->mark_final_resit >= 5) {
                $A = $this->mark_final_resit;
            }
            if ($this->mark_skill_resit >= 5) {
                $B = $this->mark_skill_resit;
            }
            return ($A + $B) / 2;
        }

        //cấm thi lần 1 và thi lần 2 (1 bài => final)
        if($this->mark_final==null && $this->mark_final_resit!=null){
            if($this->mark_final_resit >= 5){
                $A = $this->mark_final_resit;
            }
            return $A;
        }

        //cấm thi lần 1 và thi lần 2 (1 bài => skill)
        if($this->mark_skill==null && $this->mark_skill_resit!= null){
            if($this->mark_skill_resit >= 5){
                $B = $this->mark_skill_resit;
            }
            return $B;
        }

        //thi LT không thi TH
        if ($this->mark_skill == null && $this->mark_skill_resit == null) {
            if ($this->mark_final != null) {
                if ($this->mark_final >= 5) {
                    $A = $this->mark_final;
                } else {
                    $A = ($this->mark_final + $this->mark_final_resit) / 2;
                }
            }else{
                $A = $this->mark_final_resit;
            }
            return $A;
        }

        //thi TH không thi LT
        if ($this->mark_final == null && $this->mark_final_resit == null) {
            if($this->mark_skill!= null){
            if ($this->mark_skill >= 5) {
                $B = $this->mark_skill;
            } else {
                $B = ($this->mark_skill + $this->mark_skill_resit) / 2;
            }
        }else{
            $B = $this->mark_skill_resit;
        }
            return $B;
        }
    }
}
