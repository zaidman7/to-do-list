<?php

namespace App\Http\Controllers;

use App\Jobs\AddUser;
use App\Models\User;

class PostController extends Controller
{
    public $serviceProvider;

    public function returnView() {
        return view('testpost');
    }

    public function post() {
        
            $user = new User();
            $user->username = fake()->username();
            $user->email = $user->username . 'correcthorsebatterystaple@gmail.com';
            $user->password = '1234';
            $user->save();
            AddUser::dispatch($user);
        
        return 'Done!';
    }
}
