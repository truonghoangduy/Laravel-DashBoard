<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    public function createWithUserID($user){
        $userNotHasProfile = User::query()->with('profile')->where("id",'=',$user)->first();
        return view('layouts.profile.dashboard-profile-add',['userDetail'=>$userNotHasProfile]);
    }

    public function check($user)
    {
        $userNotHasProfile = User::query()->with('profile')->where("id",'=',$user)->first();
        if ($userNotHasProfile->profile != null){
            $profileID = $userNotHasProfile->profile->id;
            return redirect()->route('profiles.edit',['profile'=>$profileID]);
        }
        return back()->with('error',["messages"=>"User isn't has Profile Yet",'redirectLink'=>route("profiles.createWithUserID",["user"=>$userNotHasProfile->id])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'nullable'
        ]);
        $profileInfo = $request->all(['user_id','bio','pictureURL']);
        $userId = $profileInfo['user_id'];
        $urlToUploadedImg = $this->writeProfileImgToDisk($request);
        if ($urlToUploadedImg != false){
            $profileInfo['pictureURL'] = $urlToUploadedImg;
        }else{
            unset($profileInfo['pictureURL']);
        }
        if (Profile::query()->insert($profileInfo)){
            $createdProfile = Profile::query()->where("user_id",'=',$userId)->first();
//            dd(User::query()->with('profile')->where("id",'=',$profileInfo['user_id'])->get());
            return redirect()->route("profiles.edit",["profile"=>$createdProfile->id])->with('messages',"Created User ID:".$userId);
        }
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

        //
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
        $userProfile = Profile::query()->where('id','=',$id)->first();
        $user = User::with('profile')->where('id','=',$userProfile->user_id)->first();
        if ($user->profile == null){
            return back()->with('error',["messages"=>"User isn't has Profile Yet",'redirectLink'=>route("profiles.check",["user"=>$id])]);
        }
        return view('layouts.profile.dashboard-profile-edit',['userDetail'=>$user]);
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
        $profileInfo = $request->all(['bio','pictureURL','user_id']);
        $urlToUploadedImg = $this->writeProfileImgToDisk($request);
        if ($urlToUploadedImg != false){
            $profileInfo['pictureURL'] = $urlToUploadedImg;
        }else{
            unset($profileInfo['pictureURL']);
        }
        $result = Profile::query()->where('id','=',$id)->where('user_id','=',$profileInfo['user_id'])->update($profileInfo);
//        dd([$result,$profileInfo]);
        if ($result){
//            dd(User::query()->with('profile')->where("id",'=',$profileInfo['user_id'])->get());
            return redirect()->route("profiles.edit",["profile"=>$id])->with('messages',"Update User ID:".$id);
        }
        //
    }

    private function writeProfileImgToDisk($request){
        // return written URL
        if ($request->hasFile('profile-upload-image')){
            $uploadedFile = $request->file('profile-upload-image');
            $uploadFilePath= $uploadedFile->storeAs('uploads/profiles',
                $uploadedFile->getClientOriginalName(), 'public');

            if ($uploadFilePath){
                $fileToURL = '/storage/' . $uploadFilePath;
                return $fileToURL;
            }
        }else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
