<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'internship_id',
        'user_id',
        'current_status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function internship() {
        return $this->belongsTo(Internship::class);
    }

}
