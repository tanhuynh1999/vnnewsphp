<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\AddNewsRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function Index()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();
        //Tin tức mới nhất (1)
        $newsone = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->limit(1)
        ->get();

        //Tin tức mới nhất
        $new = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_datecreate')
        ->limit(6)
        ->get();

        //Tin tức đáng chú ý
        $newsview = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_view')
        ->limit(5)
        ->get();

        //Tin tức hot view
        $newshotview = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_view')
        ->limit(4)
        ->get();

        //Tin tức hot like
        $newshotlike = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_like')
        ->limit(4)
        ->get();

        //Tin tức moi the gioi
        $newstg = DB::table('news')
        ->where('news_active','1')
        ->where('category_id','15')
        ->orderByDesc('news_datecreate')
        ->limit(4)
        ->get();

        //Tin tức the thao
        $newstt = DB::table('news')
        ->where('news_active','1')
        ->where('category_id','19')
        ->orderByDesc('news_datecreate')
        ->limit(4)
        ->get();

        //Tin tức suc khoe
        $newssk = DB::table('news')
        ->where('news_active','1')
        ->where('category_id','18')
        ->orderByDesc('news_datecreate')
        ->limit(4)
        ->get();

        //Tin tức cong nghiep
        $newscn = DB::table('news')
        ->where('news_active','1')
        ->where('category_id','17')
        ->orderByDesc('news_datecreate')
        ->limit(2)
        ->get();

        //tất cả danh muc
        $cateall = DB::table('category')
        ->where('category_activitie','1')
        ->orderByDesc('category_view')
        ->get();

        return view('layout.layout')->with('category',$cate)
        ->with('dataone',$newsone)
        ->with('new',$new)
        ->with('newsview',$newsview)
        ->with('newshotview',$newshotview)
        ->with('newshotlike',$newshotlike)
        ->with('newstg',$newstg)
        ->with('cateall',$cateall)
        ->with('newstt',$newstt)
        ->with('newssk',$newssk)
        ->with('newscn',$newscn);
    }
}
