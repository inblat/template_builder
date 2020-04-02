<?php

namespace App\Http\Controllers;

use App;
use App\Page;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index() {
        return redirect('/en/home', 301);
    }
    public function home($locale = Page::LOC_EN) {
        App::setLocale($locale);
        session()->put('locale', $locale);
        $this->data['locale'] = $locale;
        $this->data['page'] = Page::where(['location' => $locale, 'slug' => 'home'])->first();
        $this->data['articles']['pipe'] = Page::where(['location' => $locale, 'slug' => 'pipe-angle-cutting'])->first();
        $this->data['articles']['image-generator'] = Page::where(['location' => $locale, 'slug' => 'image-generator'])->first();
        
        return view('home', $this->data);
    }
}
