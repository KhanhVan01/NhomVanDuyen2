<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    public $timestamps = false;
    public $primaryKey = 'codeAdmin';

    public function getRightAttribute(){
        if($this->role == 1){
            return "Giáo vụ";
        }else{
            return "Giảng viên";
        }
    }
}
