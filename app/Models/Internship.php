<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_name',
        'description',
        'expires_at',
        'required_faculty',
        'required_department',
        'minimum_year',

    ];

    public function statuses() {
        return $this->hasMany(Status::class)->where('user_id', Auth::id());
    }

//    public function status() {
//        return $this->hasMany(Status::class)->where('user_id', Auth::User());
//    }
}
