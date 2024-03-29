<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberService extends Model
{
    use HasFactory;
    protected $table = 'subscriber_service';

    protected $fillable = [
        'user_id', 'service_table_name', 'service_id', 'service_name', 'service_isactive', 'created_by', 'updated_by', 'created_at', 'updated_at', 'expires_at'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'expires_at'
    ];
}
