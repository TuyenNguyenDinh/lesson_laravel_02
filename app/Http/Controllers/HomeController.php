<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jobs\InserToDatabase;

class HomeController extends Controller
{
    public function insert(){
        $user = User::create(array(
            'name' => 'abc',
            'email' => Str::random(5),
            'password' => bcrypt('abcszdf')
        ));
        $job = new InserToDatabase($user);
        dispatch($job);
        return '0k';
    }
}
