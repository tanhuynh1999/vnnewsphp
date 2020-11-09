<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();

use Illuminate\Http\Request;

class ViewControler extends Controller
{
    //
    public function DetailNews($id)
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();
        //Tin tức mới nhất (1)
        $newsone = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->get();

        //xem chi tiet
        $detail = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news.news_id',$id)
        ->get();

        //Dem yeu thich
        if(session('user_email') == true)
        {
            $countfa = DB::table('favourite')
            ->where('news_id',$id)
            ->where('user_id',session('user_email'))
            ->get()
            ->count();

            session()->put('countfa',$countfa);

            //In danh sách yeu thich theo nguoi dung
            $faid = DB::table('favourite')
            ->where('news_id',$id)
            ->where('user_id',session('user_email'))
            ->get();
        }

        return view('view.detailnews')->with('category',$cate)->with('dataone',$newsone)
        ->with('detail',$detail)
        ->with('faid',$faid);
    }
    //Tat ca tin tuc
    public function AllNews()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        $new = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_datecreate')
        ->get();

        $cateall = DB::table('category')
        ->where('category_activitie','1')
        ->orderByDesc('category_view')
        ->get();

        return view('view.allnews')->with('category',$cate)
        ->with('new',$new)
        ->with('cateall',$cateall);
        
    }
    // tin tuc theo danh muc
    public function DetailCate($id)
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        //xem chi tiet
        $detail = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news.category_id',$id)
        ->get();
        
        //Tin tức đáng chú ý
        $newsview = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_view')
        ->limit(5)
        ->get();

        return view('view.detailcate')
        ->with('category',$cate)
        ->with('detail',$detail)
        ->with('newsview',$newsview);
    }

    //Danh sach tin tuc yeu thich

}
