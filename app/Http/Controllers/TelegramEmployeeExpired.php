<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\LaravelTelegramNotification;

class TelegramEmployeeExpired extends Controller
{
    public function index()
    {
        $user = User::find(1);

        $user->notify(new LaravelTelegramNotification([
            'text' => "Welcome to the application " . $user->name . "!",
            'latitude' => '14.820100',
            'longitude' => '74.182503',
            'photo' => 'https://codezen.io/wp-content/uploads/2020/03/Telegram-Notifications-In-Laravel.jpg',
            'photo_caption' => 'Telegram Notifications in Laravel'
        ]));

        return $user;
    }
}
