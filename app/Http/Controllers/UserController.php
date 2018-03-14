<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use DB;
use App\User;
use Redirect;
use Image;
use Illuminate\Support\Facades\File;
use App\Traits\ManagesImages;

class UserController extends Controller
{
    use ManagesImages;

    public function __construct()
    {

        $this->middleware(['auth', 'admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('backend.user.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $user = User::findOrFail($id);

        $profile = $user->profile;

        return view('backend.user.show', compact('user', 'profile'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->updateUser($user, $request);

        $this->updateAvatar($user, $request);

        alert()->success('Congrats!', 'You updated a user');

        return Redirect::route('user.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        User::destroy($id);

        alert()->overlay('Attention!', 'You deleted a user', 'error');

        return Redirect::route('user.index');
    }

    public function deleteImage($id)
    {
        $user = User::findOrFail($id);

        $this->deleteAvatar($user);

        return Redirect::route('user.edit', ['user' => $user]);
    }

}