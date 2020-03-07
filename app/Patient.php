<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public $dates = ['birth_date'];
    protected $fillable = [
        'name',
        'status',
        'birth_date',
        'phone_number',
        'email',
        'insured',
        'status',
    ];
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'birth_date' => 'date:Y-m-d',
        'phone_number' => 'string',
        'email' => 'string',
        'insured' => 'boolean',
    ];
}
