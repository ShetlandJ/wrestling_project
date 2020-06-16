<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Wrestler extends Model
{
    protected $table = 'wrestlers';

    public function getFullnameAttribute()
    {
        return sprintf('%s %s', $this->forename, $this->surname);
    }
}
