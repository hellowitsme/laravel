<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['type', 'location', 'experience', 'salary', 'detail'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function appy(){
        return $this->belongsTo('App\Apply');
    }
}
