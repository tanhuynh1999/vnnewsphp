<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class SubmitControler extends Controller
{
    public function deleteNewsID($id)
    {
        DB::table('news')->where('news_id', $id)->delete();
        return Redirect::to('/indexnews');
    }

    public function delNewsID($id)
    {
        $data = array();
        $data['news_del'] = 0;


        DB::table('news')->where('news_id', $id)->update($data);
        return Redirect::to('/indexnews');
    }
}
