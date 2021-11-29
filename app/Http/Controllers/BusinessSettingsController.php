<?php

namespace App\Http\Controllers;

use App\Models\BusinessSettings;
use Illuminate\Http\Request;
use File;
use DB;
class BusinessSettingsController extends Controller
{    public function activation(Request $request)
    {
    	return view('backend.setup_configurations.activation');
    }
    public function smtp_settings(Request $request)
    {
        return view('backend.setup_configurations.smtp_settings');
    }
    public function social_login(Request $request)
    {
        return view('backend.setup_configurations.social_login');
    }
    public function env_key_update(Request $request)
    {
        foreach ($request->types as $key => $type) {
                $this->overWriteEnvFile($type, $request[$type]);
        }

        session()->flash("success","Settings updated successfully");
        return back();
    }
    public function overWriteEnvFile($type, $val)
    {
        if(env('DEMO_MODE') != 'On'){
            $path = base_path('.env');
            if (file_exists($path)) {
                $val = '"'.trim($val).'"';
                if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                    file_put_contents($path, str_replace(
                        $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                    ));
                }
                else{
                    file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
                }
            }
        }
    }
    public function update(Request $request)
    {
        foreach ($request->types as $key => $type) {
            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }
            else {
                $business_settings = BusinessSettings::where('type', $type)->first();
                if($business_settings!=null){
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = json_encode($request[$type]);
                    }
                    $business_settings->save();
                }
                else{
                    $business_settings = new BusinessSettings;
                    $business_settings->type = $type;
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = json_encode($request[$type]);
                    }
                    $business_settings->save();
                }
            }
        }
        // flash(translate("Settings updated successfully"))->success();
        return back();
    }
    public function sideTopLogo(Request $request){
        foreach ($request->types as $key => $type) {
            $business_settings = BusinessSettings::where('type', $type)->first();
            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }
            if(gettype($request[$type]) == 'string'){
                if($business_settings!=null){
                    if($business_settings->type == 'about_video'){
                        $url = substr($request[$type], 32);
                        $business_settings->value = json_encode($url);
                    }else{
                        $business_settings->value = json_encode($request[$type]);
                    }
                    $business_settings->save();
                }else{
                    $business_settings = new BusinessSettings;
                    $business_settings->type = $type;
                    if($business_settings->type == 'about_video'){
                        $url = substr($request[$type], 32);
                        $business_settings->value = json_encode($url);
                    }else{
                        $business_settings->value = json_encode($request[$type]);
                    }
                    $business_settings->save();
                }
            }else{
                if($business_settings!=null){
                    $fileType = $request->file($type);
                    if($fileType != null){
                        $filePath = public_path('images/logo').'/'.json_decode($business_settings->value);
                        if($business_settings->value && File::exists($filePath)){
                            unlink(public_path('images/logo').'/'.json_decode($business_settings->value));
                        }
                        $business_settings->type = $type;
                        $fileName = rand(1001, 9999).time().'.'.$fileType->extension();
                        $fileType->move(\public_path('images/logo'), $fileName);
                        $business_settings->value = json_encode($fileName);
                        $business_settings->save();
                    }
                }
                else{
                    $business_settings = new BusinessSettings;
                    $fileType = $request->file($type);
                    if($fileType != null){
                        $business_settings->type = $type;
                        $fileName = rand(1001, 9999).time().'.'.$fileType->extension();
                        $fileType->move(\public_path('images/logo'), $fileName);
                        $business_settings->value = json_encode($fileName);
                        $business_settings->save();
                    }
                }
            }
        }
        return back();
    }
    public function home_slider(Request $request){
        $sliders = DB::table('home_slider')->get();
        return view('backend.website_settings.home_slider', compact('sliders'));
    }
    public function home_slider_update(Request $request){
        if($request->hasfile('slider_image')){
            foreach($request->file('slider_image') as $key => $file)
            {
                $name = rand(1001, 9999).time().'.'.$file->extension();
                $file->move(public_path().'/images/home_slider/', $name);
                DB::table('home_slider')->insert([
                    'url' => $request->url[$key],
                    'slider_image' => $name,
                ]);
            }
        }
        return back();
    }
    public function home_slider_delete(Request $request, $id){
        $slider_remove = DB::table('home_slider')->where('id', $id)->first();
        $image = public_path('images/home_slider').'/'.$slider_remove->slider_image;
        unlink($image);
        DB::table('home_slider')->where('id', $id)->delete();
        return back();
    }
}
