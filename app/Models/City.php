<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=[
                    'state_id',
                    'name',
    ];
    public function states(){
        return $this->belongsTo(State::class);
    }
}