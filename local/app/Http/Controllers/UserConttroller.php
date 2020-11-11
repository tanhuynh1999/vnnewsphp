<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\AddNewsRequest;
use App\Http\Requests\AddUserRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserConttroller extends Controller
{
    //
    public function Login()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        $new = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_datecreate')
        ->limit(12)
        ->get();

        return view('user.login')
        ->with('category',$cate)
        ->with('new',$new);
    }
    public function PostLogin(AddUserRequest $request)
    {
        $check = DB::table('users')->where('user_email',$request->user_email)
        ->where('user_pass',$request->user_pass)->first();
        if($check)
        {

            $view = DB::table('users')->where('user_email',$request->user_email)->get();
            foreach ($view as $key => $view) {
              session()->put('user_email',$view->user_email);
              session()->put('user_name',$view->user_name);
              session()->put('user_avatar',$view->user_image);
            }
            return Redirect::to('/');
        }
        else{
            return Redirect::to('/');
        }
    }

    public function GetLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function CheckLogin($social)
    {
        $info = Socialite::driver($social)->user();
        dd($info);
    }


    public function Reg()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->limit(6)->get();

        $new = DB::table('news')
        ->join('category','news.category_id','category.category_id')
        ->where('news_active','1')
        ->orderByDesc('news_datecreate')
        ->limit(12)
        ->get();

        return view('user.reg')
        ->with('category',$cate)
        ->with('new',$new);
    }
    public function PostReg(AddUserRequest $request)
    {
        $data = array();
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_pass'] = $request->user_pass;

        //date
        $date = new Carbon();
        $now = Carbon::now();

        $data['user_datecreate'] = $now;
        $data['user_datelogin'] = $now;

        $data['user_role'] = 1;

        DB::table('users')->insert($data);
        return Redirect::to('/');
    }

    //login facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $check = DB::table('users')->where('user_email',$user->email)->first();
        if($check)
        {
            //ses
            $data = array();

            //date
            $date = new Carbon();
            $now = Carbon::now();
            
            $data['user_datelogin'] = $now;

            DB::table('users')->insert($data);

            session()->put('user_name',$user->name);
            session()->put('user_avatar',$user->avatar);
            session()->put('user_email',$user->email);
            return Redirect::to('/');
        }
        else{

            $data = array();
            $data['user_email'] = $user->email;
            $data['user_name'] = $user->name;
            $data['user_image'] = $user->avatar;

            //date
            $date = new Carbon();
            $now = Carbon::now();

            $data['user_datecreate'] = $now;
            $data['user_datelogin'] = $now;

            $data['user_role'] = 1;

            DB::table('users')->insert($data);

            //ses
            session()->put('user_name',$user->name);
            session()->put('user_avatar',$user->avatar);
            session()->put('user_email',$user->email);

            return Redirect::to('/');
        }

    }

    // dang xuat
    public function logOut()
    {
        session()->flush();
        return Redirect::to('/');
    }

    //yeu thich
    public function favourite(AddUserRequest $request)
    {
        $data = array();

        $data['user_id'] = $request->user_id;
        $data['news_id'] = $request->news_id;

        //date
        $date = new Carbon();
        $now = Carbon::now();

        $data['favourite_datecreate'] = $now;

        DB::table('favourite')->insert($data);
        return Redirect::to('/detailnews-' .$request->news_id);
    }
    //huy yeu thich
    public function cancelFavourite(AddUserRequest $request)
    {

        DB::table('favourite')->where('favourite_id', $request->favourite_id)->delete();

        return Redirect::to('/detailnews-'.$request->news_id);
    }
    //huy yeu thich
    public function cancelFavouriteID(AddUserRequest $request)
    {
        DB::table('favourite')->where('favourite_id', $request->favourite_id)->delete();
        return Redirect::to('/all-favourite');
    }

    //like
    public function like(AddUserRequest $request)
    {
        $data = array();

        $data['user_id'] = $request->user_id;
        $data['news_id'] = $request->news_id;

        //date
        $date = new Carbon();
        $now = Carbon::now();

        $data['like_datecreate'] = $now;

        DB::table('likes')->insert($data);
        return Redirect::to('/detailnews-' .$request->news_id);
    }
    //Huy thich
    public function cancelLike(AddUserRequest $request)
    {

        DB::table('likes')->where('like_id', $request->like_id)->delete();

        return Redirect::to('/detailnews-'.$request->news_id);
    }
    //binh luan ses
    public function commentID(AddUserRequest $request)
    {
        $data = array();
        $data['news_id'] = $request->news_id;
        $data['user_id'] = session('user_email');

        //date
        $date = new Carbon();
        $now = Carbon::now();

        $data['comment_datecreate'] = $now;
        $data['comment_dateupdate'] = $now;

        $data['comment_active'] = true;

        $data["comment_content"] = $request->comment_content;


        DB::table('comment')->insert($data);

        return Redirect::to('/detailnews-' .$request->news_id);
    }
}
