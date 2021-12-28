<?php

namespace App\Http\Controllers;
use App\Models\Calender;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(){
        return view('calender');
    }
}
