<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use TCG\Voyager\Models\Page;

class PageV1Controller extends Controller
{
    public function show(string $page): View
    {
        if (!$page = Page::where('slug', $page)->first()) {
            return view('404');
        }

        return view('page', compact('page'));
    }
}
