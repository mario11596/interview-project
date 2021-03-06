<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $primaryKey = 'interview_id';

    protected $fillable = [
        'user_id',
        'job_id',
        'date',
        'time',
        'type',
    ];

    public function job(){
        return $this->hasOne(Job::class, 'job_id', 'job_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
