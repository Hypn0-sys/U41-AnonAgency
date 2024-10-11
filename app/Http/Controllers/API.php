<?php

namespace App\Http\Controllers;

use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class API extends Controller
{
    protected $encrypter;

    public function __construct()
    {
        // Directly using the plain text key
        $key = getKey();

        $cipher = 'aes-256-cbc'; // Define the cipher
        $this->encrypter = new Encrypter(substr(hash('sha256', $key, true),0,32), $cipher);
    }

    public function index()
    {
        $Message = "eyJpdiI6ImNsZFpDazFkNStTVjJsTUszUVZVZ2c9PSIsInZhbHVlIjoibk5IQW55N01BbHlUcllEVDgxUVZUdysvZkx5djVHV2ltU1IzUWNwRXZvbjdaQklJcWpYOHZyQkQzcXpSSnhHeSIsIm1hYyI6IjgwY2EwYmMzYmMxMTA2Zjk5NjdiOTFhYWU3YmI1NTU2ZWZiMWI5OTk4MWMwN2QxZDRkOTk5MGYyNGE3OTAyZDEiLCJ0YWciOiIifQ==";

        $decrypted = $this->encrypter->decrypt( $Message );

        return ['Message:'=>$decrypted];
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
