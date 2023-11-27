<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function GuzzleHttp\Promise\all;

class SettingController extends Controller
{
    public function index(){
        return view('dashboard.layouts.layout');
    }

    public function home(){
        return view('dashboard.setting');
    }

    public function update(Request $request , Setting $setting){
        $data = [
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string|required',
            'email' => 'nullable|email',
        ];
        foreach (config('app.languages') as $key => $value) {
            $data[$key . '*.title'] = 'nullable|string';
            $data[$key . '*.content'] = 'nullable|string';
            $data[$key . '*.address'] = 'nullable|string';
        }
        $validatedData = $request->validate($data);
        $setting->update($request->except(['logo', 'favicon', '_token']));
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $setting->update(['logo' => $path]);
        }
        
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $filename = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $path = 'images/' . $filename;
            $setting->update(['favicon' => $path]);
        }
        return redirect()->route('dashboard.setting');
    }

    public function test(){
        echo"ssssss";
    }
}
