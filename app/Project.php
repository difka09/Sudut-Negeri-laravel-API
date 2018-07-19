<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
         'name_project', 'verify', 'location', 'target_at', 'information', 'photo', 'id_user', 'funds', 'target_funds',
        ];
}
