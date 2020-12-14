<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['name', 'email', 'job_id'];

    public function jobs(){
        return $this->hasMany('App\Job');
    }
}
