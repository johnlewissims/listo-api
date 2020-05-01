<?php

Route::get('/reset-password', 'PasswordResetController@request');
Route::get('/change-password/{token}', 'PasswordResetController@changePassword');
