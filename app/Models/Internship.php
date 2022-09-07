<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
