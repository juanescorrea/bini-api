<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserLogin;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = UserLogin::all();
        return response()->json(['data'=>$users],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        //$values = $request->only(['name','email','login_name','bio','picture_url','facebook_id','twitter_id','social_network_flag','password']);
        $values = $request->except(['id','created_at','updated_at']);
        UserLogin::create($values);
        return response()->json(['message'=>'User correctly added'],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = UserLogin::find($id);
        if(!$user){
            return response()->json(['message'=>'this user does not exit','code' =>404],404);
        }
        return response()->json(['data'=>$user],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateUserRequest $request,$id)
    {
        $user = UserLogin::find($id);
        if(!$user){
            return response()->json(['message'=>'this user does not exit','code' =>404],404);
        }
        $name = $request->get('name');
        $email = $request->get('email');
        $bio = $request->get('bio');
        $picture_url = $request->get('picture_url');
        $password = $request->get('password');

        $user->name = $name;
        $user->email = $email;
        $user->bio = $bio;
        $user->picture_url = $picture_url;
        $user->password = $password;

        $user->save();

        return response()->json(['message'=>'The user info has been updated'],200);

                //$values = $request->only(['name','email','login_name','bio','picture_url','facebook_id','twitter_id','social_network_flag','password']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = UserLogin::find($id);
        if(!$user){
            return response()->json(['message'=>'this user does not exit','code' =>404],404);
        }
        //$vehicles= $maker->vehicles;
        //if(sizeof($vehicles) > 0 ){
            //return response()->json(['message'=>'this maker has associated vehicles. Delete his vehicles first.','code' =>409],409);
        //}
        $user->delete();
        return response()->json(['message'=>'the user was successfuly deleted','code' =>200],200);
    }
}
