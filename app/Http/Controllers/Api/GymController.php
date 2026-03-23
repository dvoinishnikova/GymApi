<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;

class GymController extends Controller
{
    public function load()
    {
        $now = Carbon::now();
        $day = $now->dayOfWeek;
        $hour = $now->hour;

        $schedule = $this->getSchedule();

        $people = $this->getPeopleForHour($schedule[$day], $hour);

        return response()->json([
            'people_now' => $people,
            'approx' => $people == 0 ? 'Зал зачинений 🔒' : "≈ $people людей",
            'status' => $this->getStatus($people),
        ]);
    }

    private function getSchedule()
    {
        return [

            0 => [
                8 => 15,
                10 => 20,
                12 => 30,
                14 => 35,
                16 => 30,
                18 => 25,
                20 => 20,
            ],

            1 => [6 => 20, 8 => 30, 10 => 25, 12 => 20, 14 => 25, 16 => 40, 18 => 60, 20 => 55],
            2 => [6 => 20, 8 => 30, 10 => 25, 12 => 20, 14 => 25, 16 => 40, 18 => 60, 20 => 55],
            3 => [6 => 20, 8 => 30, 10 => 25, 12 => 20, 14 => 25, 16 => 40, 18 => 60, 20 => 55],
            4 => [6 => 20, 8 => 30, 10 => 25, 12 => 20, 14 => 25, 16 => 40, 18 => 60, 20 => 55],
            5 => [6 => 20, 8 => 30, 10 => 25, 12 => 20, 14 => 25, 16 => 40, 18 => 60, 20 => 55],

            6 => [
                8 => 20,
                10 => 25,
                12 => 35,
                14 => 40,
                16 => 35,
                18 => 30,
                20 => 25,
            ],
        ];
    }

    private function getPeopleForHour($daySchedule, $currentHour)
    {
        if ($currentHour < 6) {
            return 0;
        }

        $lastValue = 0;

        foreach ($daySchedule as $hour => $people) {
            if ($currentHour >= $hour) {
                $lastValue = $people;
            } else {
                break;
            }
        }

        return $lastValue;
    }

    private function getStatus($count)
    {
        if ($count == 0) return 'Зачинено 🔒';
        if ($count < 20) return 'Мало 🟢';
        if ($count < 40) return 'Середньо 🟡';
        return 'Багато 🔴';
    }
}