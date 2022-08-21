<?php

namespace App\Services;

use App\Services\Contracts\SalonsClientServiceContract;
use Illuminate\Support\Facades\Http;

class SalonsClientService implements SalonsClientServiceContract
{
    protected $username;
    protected $password;
    protected $url;

    public function __construct($username, $password, $url)
    {
        $this->username = $username;
        $this->password = $password;
        $this->url = $url;
    }

    public function getSalons()
    {
        $response = Http::withBasicAuth($this->username, $this->password)->get($this->url);
        return $response->collect();
    }

    public function getRandomSalons($count)
    {
        $url = $this->url . '?limit=' . $count . '&in_random_order';
        $response = Http::withBasicAuth($this->username, $this->password)->get($url);
        return $response->collect();
    }
}