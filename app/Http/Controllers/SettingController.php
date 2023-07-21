<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return view('backend.setting.index', compact('setting'));
    }

    // data save in data

    public function save_setting(Request $request){

        // if already data has in table
        $settingData = Setting::count();
        if($settingData==0){
            $data = new Setting;
            $data->comment_auto=$request->comment_auto;
            $data->user_auto=$request->user_auto;
            $data->recent_limit=$request->recent_limit;
            $data->popular_limit=$request->popular_limit;
            $data->comment_limit=$request->comment_limit;
            $data->save();
        }else{
            //if new data inser in table
            $firstData = Setting::first();
            $data = Setting::find($firstData->id);
            $data->comment_auto=$request->comment_auto;
            $data->user_auto=$request->user_auto;
            $data->recent_limit=$request->recent_limit;
            $data->popular_limit=$request->popular_limit;
            $data->comment_limit=$request->comment_limit;
            $data->save();
        }

        return redirect('admin/setting')->with('success','Setting has been updated successfuly');
    }
}
