<?php

namespace Modules\Core\Auth;

use Modules\Core\AppService;
use Modules\Core\Exceptions\AuthException;
use Modules\Core\Users\UserRepository;

class AuthService extends AppService
{
    /* repositories */
    protected UserRepository $userRepository;

    public function __construct(UserRepository $ur) {
        $this->userRepository = $ur;
    }

    public function login($credentials = [])
    {
        $credentials['is_active'] = true;
        $token = auth()->attempt($credentials);

        if(!$token) { throw new AuthException('auth.invalid_credentials'); }

        $user = new AuthUser();

        return compact('user', 'token');
    }

    /* public registration */
    public function register($formData)
    {
        $formData['role_id'] = env('APP_ROLE_ID_ON_PUBLIC_REGISTER');
        $this->userRepository->create($formData);

        return $this->login([
            'email' => $formData['email'],
            'password' => $formData['password']
        ]);
    }

    public function changePassword($userId, $password)
    {
        return $this->userRepository
            ->findOrFail($userId)
            ->fill(compact('password'))
            ->save();
    }

    /* activate, deactivate user */
    public function toggleActivation($userId)
    {
        return $this->userRepository
            ->findOrFail($userId)
            ->toggleActivation()
            ->save();
    }
}
