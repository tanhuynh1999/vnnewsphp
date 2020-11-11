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
        ->where('news_del', 1)
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

            //In danh sách thich theo nguoi dung
            $like = DB::table('likes')
            ->where('news_id',$id)
            ->where('user_id',session('user_email'))
            ->get();

            //dem danh sach thich
            $countlike = DB::table('likes')
            ->where('news_id',$id)
            ->where('user_id',session('user_email'))
            ->get()
            ->count();

            session()->put('countlike',$countlike);

            //Dem binh luan
            $countcomment = DB::table('comment')
            ->where('news_id', $id)
            ->get()
            ->count();

            session()->put('countcomment', $countcomment);

            //danh sach binh luan
            $comment = DB::table('comment')
            ->join('users','comment.user_id','users.user_email')
            ->where('news_id', $id)
            ->get();

            //dem danh sach thich
            $countlikeall = DB::table('likes')
            ->where('news_id',$id)
            ->get()
            ->count();

            session()->put('countlikeall',$countlikeall);



            return view('view.detailnews')->with('category',$cate)->with('dataone',$newsone)
            ->with('detail',$detail)
            ->with('faid',$faid)
            ->with('like',$like)
            ->with('comment', $comment);

        }
        else{

            //dem danh sach thich
            $countlike = DB::table('likes')
            ->where('news_id',$id)
            ->get()
            ->count();

            session()->put('countlikeall',$countlike);

            //Dem binh luan
            $countcomment = DB::table('comment')
            ->where('news_id', $id)
            ->get()
            ->count();

            session()->put('countcomment', $countcomment);

            //danh sach binh luan
            $comment = DB::table('comment')
            ->join('users','comment.user_id','users.user_email')
            ->where('news_id', $id)
            ->get();


            return view('view.detailnews')
            ->with('category',$cate)
            ->with('dataone',$newsone)
            ->with('detail',$detail)
            ->with('comment', $comment);
        }
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
    public function ViewFavourite()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        $view = DB::table('users')->where('user_email',session('user_email'))->get();

        foreach ($view as $key => $view) {
          session()->put('user_role',$view->user_role);
        }

        //danh sach yeu thich
        $detail = DB::table('favourite')
        ->join('news','favourite.news_id','news.news_id')
        ->where('user_id',session('user_email'))
        ->get();

        //dem danh sach thich
        $countfavourite = DB::table('favourite')
        ->where('user_id',session('user_email'))
        ->count();

        session()->put('countfavourite',$countfavourite);

        //Dem binh luan
        $countcomment = DB::table('comment')
        ->where('user_id', session('user_email'))
        ->get()
        ->count();

        session()->put('countcomment', $countcomment);

        return view('view.viewfavourite')
        ->with('category',$cate)
        ->with('detail',$detail);
    }
    //Danh sách comments
    public function ViewComment()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        //dem danh sach thich
        $countfavourite = DB::table('favourite')
        ->where('user_id',session('user_email'))
        ->count();

        session()->put('countfavourite',$countfavourite);

        //Dem binh luan
        $countcomment = DB::table('comment')
        ->where('user_id', session('user_email'))
        ->get()
        ->count();

        session()->put('countcomment', $countcomment);

        //danh sach comment
        $detail = DB::table('comment')
        ->join('news','comment.news_id','news.news_id')
        ->where('user_id',session('user_email'))
        ->get();

        return view('view.viewcomment')
        ->with('category',$cate)
        ->with('detail',$detail);
    }
    //Trang cá nhan user
    public function userSetting()
    {
          $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

          //dem danh sach thich
          $countfavourite = DB::table('favourite')
          ->where('user_id',session('user_email'))
          ->count();

          session()->put('countfavourite',$countfavourite);

          //Dem binh luan
          $countcomment = DB::table('comment')
          ->where('user_id', session('user_email'))
          ->get()
          ->count();

          $detail = DB::table('users')
          ->where('user_email',session('user_email'))
          ->get();

          session()->put('countcomment', $countcomment);
          return view('view.settinguser')
          ->with('category',$cate)
          ->with('detail',$detail);
    }
    //editor
    public function editor()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        //dem danh sach thich
        $countfavourite = DB::table('favourite')
        ->where('user_id',session('user_email'))
        ->count();

        session()->put('countfavourite',$countfavourite);

        //Dem binh luan
        $countcomment = DB::table('comment')
        ->where('user_id', session('user_email'))
        ->get()
        ->count();

        $detail = DB::table('users')
        ->where('user_email',session('user_email'))
        ->get();

        session()->put('countcomment', $countcomment);

        return view('view.editor')
        ->with('category',$cate)
        ->with('detail',$detail);
    }
}
