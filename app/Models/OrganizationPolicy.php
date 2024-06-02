<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Organizations;


class OrganizationPolicy extends Model
{
    use HasFactory;
    protected $table = 'organization_policy';

    protected $fillable = [
        'org_id',
        'extend_days',
    ];

    public function organization()
    {
        return $this->belongsTo(Organizations::class);
    }

}
