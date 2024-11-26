<?php

namespace App\Hooks\Admin;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Action;

class ThemeSupport extends Hookable
{
    public function register()
    {
        Action::add('after_setup_theme', function () {
            add_theme_support('post-thumbnails');
            add_theme_support('title-tag');
            add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
            add_theme_support('custom-logo');
            add_theme_support('menus');
        });
    }
}
