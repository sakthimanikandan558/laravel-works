<?php

use Illuminate\Support\Facades\Route;
use Filament\Notifications\Notification;


Route::get('test', function () {
    //Currecnt user
    $user = auth()->user();
    Notification::make()
    ->title('Task Created for You')
    ->sendToDatabase($user);
    dd('hii');
});
