<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Apply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    public function index(){
        $jobs = DB::table('jobs')->paginate(5);
        $user_id = Auth::id();
        return view('jobs.index', ['jobs' => $jobs, 'user_id' => $user_id]);
    }

    public function mypage(){
        $jobs = Auth::user()->jobs()->get();
        $user_type = Auth::user()->user_type;
        return view('jobs.mypage', compact('jobs', 'user_type'));
    }

    public function new(){
        return view('jobs.new');
    }

    public function create(Request $request){
        $request->validate([
            'type' => 'required',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'detail' => 'required|string|max:255'
        ]);

        // モデルを使って、DBに登録する値をセット
        $job = new Job;

        // fillを使ってDBへ値を格納
        // $job->fill($request->all())->save();

        Auth::user()->jobs()->save($job->fill($request->all()));

        // リダイレクト
        return redirect('/jobs')->with('flash_message', __('Registered'));
    }

    public function show($id){
         //GETパラメータが数字かどうかチェック
         if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);       
    }

    public function edit($id){
        //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }

        $job = Auth::user()->Jobs()->find($id);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Request $request, $id){
        //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }

        $request->validate([
            'type' => 'required',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'detail' => 'required|string|max:255'
        ]);

        $job = Job::find($id)->fill($request->all())->save();

        return redirect('/jobs')->with('flash_message', __('Updated'));
    }

    public function destroy($id){
       //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }

        $job = Auth::user()->Jobs()->find($id)->delete();

        return redirect('/jobs')->with('flash_message', __('Deleted'));
    }

    public function apply($id){
        //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }

        $job = DB::table('jobs')->find($id);

        return view('jobs.apply', compact('job'));
    }

    public function applied(Request $request, $id){
        //GETパラメータが数字かどうかチェック
        if(!ctype_digit($id)){
            return redirect('/jobs')->with('flash_message', __('Invalid Operation was Performed'));
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'introduction' => 'required|string|max:255'
        ]);

        $job = DB::table('jobs')->find($id);

        $apply = new apply;
        $apply->name = $request->name;
        $apply->email = $request->email;
        $apply->job_id = $id;
        $apply->save();

        return redirect('/jobs')->with('flash_message', __('Applied'));
    }

}
