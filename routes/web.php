<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberRegistrationController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\NasRegistrationController;
use App\Http\Controllers\InternetPackagesController;
use App\Http\Controllers\IptvPackagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersRolesController;
use App\Http\Controllers\UsersPermissionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RouterSettingController;
use App\Http\Controllers\FivegRouterSettingController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\EmailVarificationController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/adduser', [UserController::class, 'showAddUserPage'])->name('adduser')->middleware(['auth', 'verified']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth:web', 'role:technician,admin'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegisterPage'])->name('register');
    Route::get('/addsystemuser', [RegisterController::class, 'showSystemUserRegisterPage'])->name('register');
    Route::get('/addnas', [NasRegistrationController::class, 'showRegisternasPage'])->name('showRegisternasPage');
    Route::post('/register', [RegisterController::class, 'startRegistration'])->name('startRegistration');
    Route::post('/subscriberregister', [SubscriberRegistrationController::class, 'registerSubscriber'])->name('registerSubscriber');
    Route::post('/registernas', [NasRegistrationController::class, 'registerNas'])->name('registerNas');
});

Route::get('/offers', [OffersController::class, 'showOffersPage'])->name('offers');
Route::get('/services', [ServicesController::class, 'showServicesPage'])->name('services');
Route::get('/contacts', [ContactsController::class, 'showContactsPage'])->name('contacts');
Route::get('/timeline', [TimelineController::class, 'showTimelinePage'])->name('timeline');


// Route::get('/getactivedevice', [RouterSettingController::class, 'getActiveDevices'])->name('getActiveDevices')->middleware('auth');
// Route::get('/refreshhost', [RouterSettingController::class, 'refreshHost'])->name('refreshHost')->middleware('auth');
// Route::get('/getrouterinfo', [RouterSettingController::class, 'getRouterInfo'])->name('getRouterInfo')->middleware('auth');


// Route::post('/reboot5g', [FivegRouterSettingController::class, 'rebootRouter'])->name('reboot5gRouter')->middleware('auth');
// Route::post('/5g', [FivegRouterSettingController::class, 'routerSetting'])->name('5grouterSetting')->middleware('auth');
// Route::get('/5g', [FivegRouterSettingController::class, 'showRouterSettingPage'])->name('showRouterSettingPage')->middleware('auth');


Route::get('/email/verify',[EmailVarificationController::class, 'index'])->middleware('auth')->name('verification.notice');


 
Route::get('/email/verify/{id}/{hash}', [EmailVarificationController::class, 'emailVerify'])->middleware(['signed'])->name('verification.verify');
// Route::get('/email/verify/{id}/{hash}', [EmailVarificationController::class, 'emailVerify'])->middleware(['auth', 'signed'])->name('verification.verify');


 
Route::post('/email/verification-notification',[EmailVarificationController::class, 'sendEmailVerificationNotification'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', [HomeController::class, 'showHomePage'])->name('index');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'startLogin'])->name('startlogin');
});


Route::middleware(['auth:sub'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'showDashboardPage'])->name('dashboard');
    Route::get('/router', [RouterSettingController::class, 'showRouterSettingPage'])->name('router');
    Route::get('/account', [AccountController::class, 'showAccountPage'])->name('account');
    Route::get('/support', [SupportController::class, 'showSupportPage'])->name('support');
    
    
    Route::get('/reboot', [RouterSettingController::class, 'rebootRouter'])->name('rebootRouter');
    Route::post('/routersetting', [RouterSettingController::class, 'routerSetting'])->name('routerSetting');
    
});

Route::middleware(['auth:web', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminPage'])->name('admin');
    Route::post('/addinternetpackage', [InternetPackagesController::class, 'addInternetPackage'])->name('addInternetPackage');
    Route::post('/addiptvpackage', [IptvPackagesController::class, 'addIptvPackage'])->name('addIptvPackage');

    Route::get('/viewalluser', [SubscriberController::class, 'viewAllUsers'])->name('viewAllusers');
    Route::get('/manageuser', [SubscriberController::class, 'manageUser'])->name('manageUser');

    Route::get('/rebootrouter', [RouterSettingController::class, 'rebootRouter'])->name('rebootRouter');
    Route::get('/deleteallusers', [UserController::class, 'deleteAllUsers'])->name('deleteAllusers');
    Route::get('/getallusers', [UserController::class, 'getAllUsers'])->name('getAllusers');
    Route::post('/role', [RoleController::class, 'addRole'])->name('addRole');
    Route::post('/deleterole', [RoleController::class, 'deleteRole'])->name('deleteRole');
    Route::get('/deleteallrole', [RoleController::class, 'deleteAllRoles'])->name('deleteAllRoles');
    Route::post('/permission', [PermissionsController::class, 'addPermission'])->name('addPermission');
    Route::post('/deletepermission', [PermissionsController::class, 'deletePermission'])->name('deletePermission');
    Route::get('/deleteallPermission', [PermissionsController::class, 'deleteAllPermissions'])->name('deleteAllPermissions');
    Route::post('/adduserrole', [UsersRolesController::class, 'addUserRole'])->name('addUserRole');
    Route::post('/removeuserrole', [UsersRolesController::class, 'removeUserRole'])->name('removeUserRole');
    Route::get('/deletealluserrole', [UsersRolesController::class, 'deleteAllUserRoles'])->name('deleteAlluserRole');
    Route::post('/adduserpermission', [UsersPermissionsController::class, 'addUserPermission'])->name('addUserPermission');
    Route::post('/removeuserpermission', [UsersPermissionsController::class, 'removeUserPermission'])->name('removeUserPermission');
    Route::get('/deletealluserpermission', [UsersPermissionsController::class, 'deleteAllUserPermissions'])->name('deleteAlluserPermission');

    //Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    //Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

Route::get('getPackages', [InternetPackagesController::class, 'getInternetPackages'])->name('getInternetPackages');