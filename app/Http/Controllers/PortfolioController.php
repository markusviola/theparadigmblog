<?php

namespace TheParadigmArticles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class PortfolioController extends Controller
{
    public function index() {

        if (request()->locale == 'jp') {
            App::setLocale('jp');
            $lang = 'jp';
        } else $lang = 'en';
        $portfolio = Lang::get('portfolio');

        return view('portfolio.onepage', compact('portfolio', 'lang'));
    }
}
