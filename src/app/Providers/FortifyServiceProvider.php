<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Fortify::createUsersUsing(CreateNewUser::class);

    // 新規登録画面
    Fortify::registerView(function () {
        return view('auth.register');
    });

    // ログイン画面
    Fortify::loginView(function () {
        return view('auth.login');
    });

    RateLimiter::for('login', function (Request $request) {
        $email = (string) $request->email;

        return Limit::perMinute(10)->by($email . $request->ip());
    });


    Fortify::authenticateUsing(function ($request) {

        $formRequest = app(LoginRequest::class);
        $formRequest->merge($request->all());
        $formRequest->validateResolved();

        $validated = $formRequest->validated();

    $user = User::where('email', $validated['email'])->first();

    if (! $user || ! Hash::check($validated['password'], $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['ログイン情報が登録されていません。']
        ]);
    }

        return $user;
    });

}
}