<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $primaryKey = 'company_id';

    protected $fillable = [
        'email_id',
        'name',
        'address',
        'city',
        'number_employees',
        'type',
    ];

    public function job(){
        return $this->hasMany(Job::class, 'job_id');
    }

    public function interviews(){
        return $this->belongsToMany(Interview::class, 'interviews');
    }

    public function user(){
        return $this->belongsTo(User::class, 'email_id');
    }
}
