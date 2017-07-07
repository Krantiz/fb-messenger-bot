<?php

namespace LodhaStarter;

use Illuminate\Database\Eloquent\Model;

class SkarmaProject extends Model
{
    protected $fillable = ['name', 'description', 'img_url', 'web_url', 'started_at'];
    protected $table = 'skarma_projects';
}
