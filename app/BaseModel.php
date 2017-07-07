<?php

namespace IndianSuperLeague;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
 
    public function getCreatedAtAttribute($value)
    {
        return date('c', strtotime($value));
    }
 
    public function getUpdatedAtAttribute($value)
    {
        return date('c', strtotime($value));
    }
}