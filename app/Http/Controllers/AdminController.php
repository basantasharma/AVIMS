<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscriberController;


class AdminController extends Controller
{
    public function showadminPage()
    {
        $registeredSystemUsers = (new UserController())->getAllUsers();
        $registeredSubscriber = (new SubscriberController())->getAllSubscribers();
        $registeredRoles = (new RoleController())->seeAllRoles();
        $registeredPermissions = (new PermissionsController())->seeAllPermissions();
        return view('admin')->with('registeredsystemusers', $registeredSystemUsers)->with('registeredsubscribers', $registeredSubscriber)->with('registeredroles', $registeredRoles)->with('registeredpermissions', $registeredPermissions);
    }
    //
}
