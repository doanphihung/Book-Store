<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLanguage($language)
    {
        session()->put('language', $language);
        return back();
    }
}
