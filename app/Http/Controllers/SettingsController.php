<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Image;
use Illuminate\Support\Facades\File;
use App\Traits\ManagesImages;

class SettingsController extends Controller
{
    use ManagesImages;

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit()
    {
        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        return view('backend.settings.edit', compact('user'));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users,email,' .$id,
            'is_subscribed' => 'boolean'
        ]);

        $user = User::findOrFail($id);

        $user->update(['name'  => $request->name,
            'email' => $request->email,
            'is_subscribed' => $request->is_subscribed
        ]);

        $this->updateAvatar($user, $request);

        alert()->success('Congrats!', 'You updated your user settings');

        return redirect()->action('SettingsController@edit');

    }

    public function deleteImage($id)
    {
        $user = User::findOrFail($id);

        $this->deleteAvatar($user);
        
        return redirect()->action('SettingsController@edit');
    }
}