<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;
    protected $table = 'organizations';
    protected $fillable = [
        'orgname',
        'full_name',
        'branch',
    ];
}
