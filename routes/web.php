<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\AvatarController;


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

Route::get('/', function () {
    // return view('welcome');
    //fetch  all users
    // $users = DB::select("select * from users");
    // $users = DB::table('users')->get();
    // $users = User::where('id', 1)->first();
    // $user = user::find(6);

    //create new user
    // $user = DB::insert('insert into users (name, email, password) values(?,?,?)', [
    //     'PapaYaw',
    //     'Papa@gmail.com',
    //     'password',
    // ]);
    // $user = DB::table('users')->insert([
    //     'name' => 'papsi',
    //     'email' => 'papsi@gmail.com',
    //     'password' => 'password',
    // ]);
    // $user = User::create([
    //     'name' => 'papsi',
    //     'email' => 'papsi5@gmail.com',
    //     'password' => 'password',
    // ]);

    //update user
    // $user = DB::update("update users set email=? where id=?",[
    //     'papa@gmail.com',
    //     2,
    // ]);
    // $user = DB::table('users')->where('id', 1)->update([
    //     'email' => 'noemail@gmail.com'
    // ]);
    // $user = User::find(1);
    // $user = $user->update([
    //     'email' => 'papaowusuas@gmail.com',
    // ]);

    //delete uesr
    // $user = DB::delete("delete from users where id=2");
    // $user = DB::table('users')->where('id', 3)->delete();
    // $user = User::find(4);
    // $user->delete();
    // dd($user->name);

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
