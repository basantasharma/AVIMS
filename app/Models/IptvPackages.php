<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptvPackages extends Model
{
    use HasFactory;

    protected $table = 'iptv_packages';

    protected $fillable = [
        'service_name', 
        'service_isactive', 
        'service_price', 
        'service_duration',
        'no_of_HD_channels', 
        'no_of_SD_channels', 
        'service_description',
        'created_by', 
        'updated_by'
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];
}
