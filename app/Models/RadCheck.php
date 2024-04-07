<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadCheck extends Model
{
    use HasFactory;
    protected $table = 'radcheck';
    protected $connection = 'radius';
    
    public $timestamps = false;
    protected $fillable = [
        'username',
        'attribute',
        'op',
        'value'
    ];
}
