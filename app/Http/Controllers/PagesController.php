<?php

/**
 * 处理所有自定义页面的逻辑，并使用 root() 方法来处理首页的展示
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PagesController extends Controller
{

    public function root(){

        return view('pages.root');
    }
}
