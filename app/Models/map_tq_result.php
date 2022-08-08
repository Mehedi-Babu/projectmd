<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class map_tq_result extends Model
{
    use HasFactory;
    protected $fillable = ['candidateid','result','raw_data',];
}
