<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CalenderStudent;

class CalendarStudent extends Controller
{
    public function index(Request $request)
    {
        // on page load this ajax code block will be run
        if ($request->ajax()) {

            $data = CalenderStudent::whereDate("start",">=",$request->start)
                ->whereDate("end",">=",$request->end)
                ->get(['id','title','start','end']);


            return response()->json($data);
        }

        return view('user.calendar-user');
    }

    /**
     * This method is to handle event ajax operation
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {

            // For add event
            case 'add':
                $event = CalenderStudent::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
                break;

            // For update event
            case 'update':
                $event = CalenderStudent::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            // For delete event
            case 'delete':
                $event = CalenderStudent::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                break;
        }
    }
}
