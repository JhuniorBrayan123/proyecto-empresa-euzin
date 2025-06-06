<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();

});
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }

    $user = User::where('email', $request->email)->first();
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['token' => $token]);
});
