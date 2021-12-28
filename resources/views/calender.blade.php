@extends('layout.index')
@section('content1')
    <a class="navbar-brand" href="#"> LỊCH HỌC </a>
@endsection
@section('content')
    <style type="text/css">
        body {
            background: #efefef
        }

        div #content {
            width: 1000px;
            position: relative;
            margin: 0 auto;
            background: #fff;
            padding: 10px;
            text-align: center;
            font-family: Helvetica, Arial, sans-serif
        }

        table {
            margin-top: 25px;
            -webkit-user-select: none
        }

        .days td {
            height: 15px !important;
            text-align: center;
            font-size: 14px;
            padding: 5px 0 5px 0 !important;
            color: #555;
            font-weight: bold
        }

        .month td {
            margin: 0;
            border-top: 1px solid #adb0b1;
            border-left: 1px solid #adb0b1;
            background: #d4d7d8;
            position: relative;
            height: 50px;
            padding: 20px 0 0 0;
            width: 70px
        }

        .month td:hover:not(.today) {
            background: #cbd1d3
        }

        .planner .blur {
            background: #eceded
        }

        .planner .today {
            background: #c4cacc
        }

        .month td a.date {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 12px;
            color: #9fa1a1
        }

        p {
            font-size: 12px;
            color: #999
        }

    </style>
    <div id="content" class="planner">
        <h2><?php echo date('F Y'); ?></h2>
        <table class="month" border="1px">
            <tr class="days">
                <td>Mon</td>
                <td>Tues</td>
                <td>Wed</td>
                <td>Thurs</td>
                <td>Fri</td>
                <td>Sat</td>
                <td>Sun</td>
            </tr>
            <?php

            $today = date('d'); // Current day
            $month = date('m'); // Current month
            $year = date('Y'); // Current year
            $days = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Days in current month

            $lastmonth = date('t', mktime(0, 0, 0, $month - 1, 1, $year)); // Days in previous month

            $start = date('N', mktime(0, 0, 0, $month, 1, $year)); // Starting day of current month
            $finish = date('N', mktime(0, 0, 0, $month, $days, $year)); // Finishing day of  current month
            $laststart = $start - 1; // Days of previous month in calander

            $counter = 1;
            $nextMonthCounter = 1;

            if ($start > 5) {
                $rows = 6;
            } else {
                $rows = 5;
            }

            for ($i = 1; $i <= $rows; $i++) {
                echo '<tr class="week">';
                for ($x = 1; $x <= 7; $x++) {
                    if ($counter - $start < 0) {
                        $date = $lastmonth - $laststart + $counter;
                        $class = 'class="blur"';
                    } elseif ($counter - $start >= $days) {
                        $date = $nextMonthCounter;
                        $nextMonthCounter++;

                        $class = 'class="blur"';
                    } else {
                        $date = $counter - $start + 1;
                        if ($today == $counter - $start + 1) {
                            $class = 'class="today"';
                        }
                    }

                    echo '<td ' . $class . '><a class="date">' . $date . '</a></td>';

                    $counter++;
                    $class = '';
                }
                echo '</tr>';
            }

            ?>
        </table>
    </div>
@endsection
