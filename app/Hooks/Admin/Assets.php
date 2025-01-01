<?php

namespace App\Hooks\Admin;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Asset;

class Assets extends Hookable
{

    public function register()
    {
        Asset::add('admin-style', 'css/admin.css')->to('admin');
        Asset::add('font-awesome', 'css/all.min.css')->to('admin');
        Asset::add('admin-script', 'js/app.js')->to('admin');

        Asset::add('style', 'css/app.css')->to();
    }
}
