<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class map_tq_login_credential extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'token', 'raw_data'];
}
