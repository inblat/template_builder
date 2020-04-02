<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function sitemap() {
        $sitemap = file_get_contents('sitemap.xml');
        return response($sitemap, 200, ['Content-Type' => 'text/xml']);
    }
}
