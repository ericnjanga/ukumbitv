<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Vimeo\Vimeo;

class VimeoController extends Controller
{
    private $client_id;
    private $secret;
    private $token;
    private $lib;


    // Create a new instance with our vimeo credentials
    public function __construct()
    {

        $this->client_id = env('VIMEO_CLIENT_ID', '');
        $this->secret = env('VIMEO_CLIENT_SECRET', '');
        $this->token = env('VIMEO_TOKEN', '');

        $this->lib = new Vimeo($this->client_id, $this->secret, $this->token);

    }

    public function getVideos()
    {
        $res = $this->lib->request('/me/videos', ['per_page' => 100], 'GET');
        dd($res);
    }

    public function createAlbum()
    {
        $res = $this->lib->request('/me/albums', ['name' => 'testAlbum 1', 'description' => 'season 1'], 'POST');
        dd($res);
    }
}
