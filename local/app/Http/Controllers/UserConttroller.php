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
        return view();
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

        DB::table('favourite')->insert($data);
        return Redirect::to('/detailnews-' .$request->news_id);
    }
    //huy yeu thich
    public function cancelFavourite(AddUserRequest $request)
    {

        DB::table('favourite')->where('favourite_id', $request->favourite_id)->delete();

        return Redirect::to('/detailnews-'.$request->news_id);
    }
}
