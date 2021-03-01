<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function setTheme()
    {
        $themeId =request()->themes;

        return redirect()->back()->cookie(
            'themeId',$themeId
        );
    }
    
}
