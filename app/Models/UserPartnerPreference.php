<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPartnerPreference extends Model
{
    use HasFactory;

    protected $casts = [
        'occupation' => 'json',
        'family_type' => 'json'
    ];

    protected $fillable = [
        'user_id',
        'expected_income',
        'occupation',
        'family_type',
        'manglik',
    ];
}
