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

    public function hardOne($id) {
        if($id == 1337 % 42) {
            $HardMessage = "eyJpdiI6IkhMK2tXTDdocUNPcmhiVE1NZGNJK2c9PSIsInZhbHVlIjoibnlqOTJDTjFIcWd6aGJrdytydDQ0Q25NNUxVMHYwNWN3UVZlUjAreFU2dko1RVlOaHJnU3RQc1FGWEIyUDdPZyIsIm1hYyI6ImIxNDE0NTc0ZTZiODk0ZGRmYzI1NWU4MDI1ZWUwMDBlNzVlYzRmM2JiZjkyYzVjNTI5ZWQzOWVjNWJlNTRhYTgiLCJ0YWciOiIifQ";
            $encrypter = new Encrypter(substr(hash('sha256', env("SECURED_KEY"), true),0,32), 'aes-256-cbc');
            return $encrypter->decrypt($HardMessage);
        }else {
            return 'Wrong Path.';
        }
    }

}
