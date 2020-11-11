<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajaxNews()
    {
         $news = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->where('news_del', 0)
        ->orderByDesc('news_datecreate')->get();

        return view('admin.ajax.news')->with('news',$news);
    }
    public function ajaxAllNews()
    {
         $news = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->where('news_del', 1)
        ->orderByDesc('news_datecreate')->get();

        return view('admin.ajax.news')->with('news',$news);
    }
    public function ajaxNotActiveNews()
    {
         $news = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','0')
        ->where('news_del', 1)
        ->orderByDesc('news_datecreate')->get();

        return view('admin.ajax.news')->with('news',$news);
    }
}
