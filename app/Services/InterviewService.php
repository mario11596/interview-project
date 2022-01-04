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
            $date = $raw_date->format('Y-m-d');

            $available_times = range(8, 18);
            $taken_times = array();

            $job_times = DB::table('interviews')
                ->join('jobs', 'interviews.job_id', '=' ,'jobs.id')
                ->where('jobs.company_id', $company)
                ->whereDate('deadline', '>', now()->format('Y-m-d'))
                ->whereDate('date', $date)
                ->pluck('time');

            foreach ($job_times->toArray() as $time_str) {
                $time = strtotime($time_str);
                $taken_times[] = intval(date('h.i', $time));
            }

            $free_times[$date] = array_values(array_diff($available_times, $taken_times));
        }
        return $free_times;
    }
}
