<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->hasMany(Subject::class,'subject_id', 'id');
    }
}
