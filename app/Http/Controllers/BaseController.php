<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $data;

    public function __construct() {
        $this->data['locale'] = App::getLocale();
    }
}
