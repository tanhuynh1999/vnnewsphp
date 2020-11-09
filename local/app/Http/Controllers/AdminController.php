<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCateRequest;
use App\Http\Requests\AddNewsRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();

class AdminController extends Controller
{
    //News
    public function IndexNews()
    {
        $news = DB::table('news')->where('news_active','1')->orderByDesc('news_datecreate')->get();
        return view('admin.view.viewnews')->with('news',$news);
    }
    public function AddNews()
    {
        $cate = DB::table('category')->where('category_activitie','1')->orderByDesc('category_view')->get();
        return view('admin.create.news')->with('category',$cate);
    }
    public function PostAddNews(AddNewsRequest $request)
    {
        $data = array();
        $data['news_name'] = $request->news_name;
        $data['news_view'] = $request->news_view;
        $data['news_like'] = $request->news_like;
        $data['news_content'] = $request->news_content;
        $data['category_id'] = $request->category_id;

        //images
        $get_img = $request->file('news_img');

        $get_name_img = $get_img->getClientOriginalName();
        $name_img = current(explode('.', $get_name_img));
        $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
        $get_img->move('assets/images', $new_img);

        $data['news_img'] = $new_img;

        //date
        $date = new Carbon();
        $now = Carbon::now();

        $data['news_datecreate'] = $now;

        //auto
        $data['news_active'] = true;
        $data['news_del'] = true;


        DB::table('news')->insert($data);
        return Redirect::to('indexnews');
    }

    //category
    public function IndexCategory()
    {
        $category = DB::table("category");
        $category = $category->orderBy("category_name","Desc");
        $category = $category->select("*");
        $data = $category->paginate(15);

        return view('admin.view.viewcategory',$data);
    }
    public function CreateCategory(AddCateRequest $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_view'] = $request->category_view;

        $get_img = $request->file('category_img');

        $get_name_img = $get_img->getClientOriginalName();
        $name_img = current(explode('.', $get_name_img));
        $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
        $get_img->move('assets/images', $new_img);

        $data['category_img'] = $new_img;

        $date = new Carbon();
        $now = Carbon::now();

        $data['category_datecreate'] = $now;
        $data['category_activitie'] = true;
        $data['category_del'] = true;

        DB::table('category')->insert($data);
        return Redirect::to('indexcategory');

    }
}
