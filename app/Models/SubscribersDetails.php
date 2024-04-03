<?php

namespace App\Models;

use App\Models\Roles;
use App\Models\Permissions;
use App\Models\UsersRoles;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SubscribersDetails extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'subscribers_details';

    protected $fillable = [
        'subscriber_username',
        'subscriber_password',
        'subscriber_type',
        'connection_type',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'occupation',
        'pan',
        'father_full_name',
        'mother_full_name',
        'grand_father_full_name',
        'spouse_full_name',
        'identity_proof_type',
        'identity_proof_photo',
        'account_enabled',
        'portal_enabled',
        'portal_username',
        'portal_password',
        'email',
        'refered_by',

        'organization_name',
        'organization_registration_number',
        'organization_pan',

        'Phone_number',
        'cellphone_number',
        'permanent_state',
        'permanent_district',
        'permanent_vdc/mun',
        'permanent_ward_number',
        'permanent_street',
        'permanent_house_number',
        'current_state',
        'current_district',
        'current_vdc/mun',
        'current_ward_number',
        'current_street',
        'current_house_number',
        'current_latitude',
        'current_longitude',
        
        'installed_by',
        'access_point',
        'drop_wire_used_serial_number',
        'ip_type',
        'ip_address',
        'vlan_id',
        'cpe_model_name',
        'cpe_serial_number',
        'cpe_mac_address',
        'lead_id',
        'lead_organization'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'portal_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['portal_password'] = bcrypt($value);
    }


    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'users_roles', 'user_id', 'role_id');
    }
    public function permissions()
    {
        return $this->hasManyThrough(Permissions::class, Roles::class);
    }

    public function hasRole($role)
    {
        
        $roleid = Roles::where('role', '=', $role)->pluck('id');
        //$userid = User::where('id', '=', auth()->user()->id)->pluck('id');
        //dd(UsersRoles::where('role_id', '=', $roleid)->where('user_id', '=', $userid)->pluck('id'));
        return UsersRoles::where('role_id', '=', $roleid)->where('user_id', '=', auth()->user()->id)->pluck('id');
        //return $this->roles->contains('name', $role);
        //return Roles::contains('name', $role);
        //return $this->roles()->whereIn('name', $role);//->exists();
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }
}
