<?php

namespace Tests;


class ApiTest extends TestCase
{
    protected $adminToken = null;

    private $email = null;
    private $password = null;
    private $loginUrl = 'api/auth/login';

    public function __construct()
    {
        $this->email = env('TESTS_ADMIN_EMAIL', 'admin@admin.com');
        $this->password = env('TESTS_ADMIN_PASSWORD', 'password');
        parent::__construct();
    }

    protected function loginAsAdmin()
    {
        if(!is_null($this->adminToken)) { return true; }

        $payload = ['email' => $this->email, 'password' => $this->password];

        $response = $this->postJson($this->loginUrl, $payload)
            ->getData()
            ->response;

        $this->adminToken = $response->token;
    }

    protected function authJson($method, $url, $data = [])
    {
        $this->loginAsAdmin();

        $headers = [
            'Authorization' => "Bearer {$this->adminToken}",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
        $url = "api/{$url}";

        return $this->json($method, $url, $data, $headers);
    }

    protected function authPost($url, $data = [])
    {
        return $this->authJson('POST', $url, $data);
    }

    protected function authGet($url)
    {
        return $this->authJson('GET', $url);
    }
}
