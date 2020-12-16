<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $listOfUser = User::with('role')->get();
         return view('layouts.profile.dashboard-profile',['listOfUser'=>$listOfUser]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.profile.dashboard-profile-add');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user = User::with('profile')->where('id','=',$id)->first();
//        if ($user->profile == null){
//            return back()->with('error',["messages"=>"User isn't has Profile Yet",'redirectLink'=>route("profiles.createWithUser",["user"=>$id])]);
//        }
//        return redirect()->route('profiles.edit',['profile'=>$user->profile->id]);
//        return view('layouts.profile.dashboard-profile-edit',['userDetail'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::query()->firstWhere('id','=',$id);
        return view('layouts.user.dashboard-user-edit',['userDetail'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productUpdatedInfo = $request->all(['name','email','role_id']);
//        dd($productUpdatedInfo);

//        dd($productUpdatedInfo);
        DB::table('users')->where('id','=',$id)->update($productUpdatedInfo);
        return redirect()->route('users.index')->with("result",true);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::query()->where("id",'=',$id)->first();
        if ($user->delete()){
            return redirect()->route("users.index")->with("messages","Remove user ID:".$id);
        }
        //
    }
}
