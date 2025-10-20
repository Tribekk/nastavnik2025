<?php

namespace App\Models;

use HasFa;
use Illuminate\Database\Eloquent\Model;

class TypeOfThinkingResultAverage extends Model
{

    protected $table = 'type_of_thinking_result_averages';

    protected $fillable = [
        'title',
        'description',
        'percentage_from',
        'percentage_to',
        'type_result',
    ];
}
