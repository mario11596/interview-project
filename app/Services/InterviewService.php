<?php

namespace App\Services;

use App\Models\Job;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\DB;

class InterviewService {
    //Nemam pojma što ovdje radim
    public function getTimes($job_id) {
        $company = Job::find($job_id)->value('company_id');
        $deadline = Job::find($job_id)->value('deadline');

        $period = new DatePeriod(
            new DateTime(),
            new DateInterval('P1D'),
            new DateTime($deadline)
        );

        $free_times = array();

        foreach ($period as $raw_date) {
            if ($raw_date->format('w') == 0 or $raw_date->format('w') == 6) {
                continue;
            }

            $date = $raw_date->format('Y-m-d');

            $time_period = new DatePeriod(
                new DateTime("08:00"),
                new DateInterval('PT1H'),
                new DateTime("18:00")
            );

            $available_times = array();
            foreach ($time_period as $raw_time) {
                $available_times[] = $raw_time->format('H:i');
            }

            $taken_times = array();

            $job_times = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=' ,'jobs.job_id')
                ->where('jobs.company_id', $company)
                ->whereDate('deadline', '>', now()->format('Y-m-d'))
                ->whereDate('date', $date)
                ->pluck('time');

            foreach ($job_times->toArray() as $time_str) {
                $time = new DateTime($time_str);
                $taken_times[] = $time->format('H:i');
            }

            $free_times[$date] = array_values(array_diff($available_times, $taken_times));
        }
        return $free_times;
    }
}
