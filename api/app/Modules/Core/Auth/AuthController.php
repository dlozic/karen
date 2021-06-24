<?php

namespace Modules\Core\Auth;

use Modules\Core\AppController;
use Modules\Core\Auth\Requests\AttemptLogin;
use Modules\Core\Auth\Requests\AttemptRegister;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Auth\Requests\AttemptToggleActivation;
use Modules\Core\Auth\Requests\ChangePassword;

class AuthController extends AppController
{
    /* services */
    protected AuthService $auth;

    public function __construct(AuthService $auth) {
        $this->auth = $auth;
    }

    public function login(AttemptLogin $request)
    {
        $credentials = $request->validated();
        $response = $this->auth->login($credentials);
        return success($response);
    }

    public function register(AttemptRegister $request)
    {
        $raw = $request->validated();
        $response = $this->auth->register($raw);
        return success($response);
    }

    public function me()
    {
        $user = Auth::user()->load(['role', 'language', 'profileImage']);
        return success($user);
    }

    public function changePassword(ChangePassword $request, int $user)
    {
        $newPassword = $request->validated()['password'];
        $this->auth->changePassword($user, $newPassword);
        return success();
    }

    public function toggleActivation(AttemptToggleActivation $request, int $user)
    {
        $this->auth->toggleActivation($user);
        return success();
    }
}
