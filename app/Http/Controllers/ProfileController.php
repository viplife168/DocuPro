<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Http\Controllers\SysSettingController as Sys;
use Illuminate\Database\Eloquent\Builder;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function getProfile($id)
    {
        $user = Profile::find($id);
        if($user == NULL)
        {
            return 0;
        }
        else
        {
            return $user;
        }
    }
    public static function setRole($user_id, $newrole)
    {
        $user = User::find($user_id);
        $updated = User::updateOrCreate([
            'id' => $user_id
        ], [
            'role' => $newrole
        ]);
        return $updated;
    }
    public static function getAvatar()
    {
        $email = auth()->user()->email;
        clearstatcache();
        if (file_exists(public_path() . '/images/avatar/' . $email . '.jpg'))
            return asset('images/avatar/' . auth()->user()->email . '.jpg');
        else
            return asset('images/avatar/default@docupro.jpg');
    }
    public function viewProfile()
    {
        return view('profiles.show');
    }
    public function viewAddProfile()
    {
        $data = [
            'departments' => Sys::showSetting('departments'),
        ];
        return view('profiles.new',$data);
    }
    public static function addProfile($user_id, $input)
    {
        if (count(Profile::where('profile_id', $user_id)->get()) != 0) {
            //return error code
            return 'User Exist';
            exit;
        } else {
            $data = $input->all();
            $user = User::find($user_id);
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $user->profile()->create($data);
            return redirect()->action('ProfileController@viewProfile');
        }
    }
    public function viewEditProfile()
    {
        $user = auth()->user();
        $data = [
            'departments' => Sys::showSetting('departments'),
            'name' => $user->name,
            'email'=> $user->email,
            'department' => $user->profile->department,
            'phone_ext' => $user->profile->phone_ext,
            'designation' => $user->profile->designation,
            'gred' => $user->profile->gred,
        ];
        return view('profiles.edit',$data);
    }
    public function submitEditProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->profile->department = $request->department;
        $user->profile->phone_ext = $request->phone_ext;
        $user->profile->designation = $request->designation;
        $user->profile->gred = $request->gred;
        $user->push();
        return redirect()->action('ProfileController@viewProfile');
    }
    public static function getUserFromDepartment($department)
    {
        $users = Profile::with('user')->where('department',$department)->get();
        return $users;
    }
    public static function name($id)
    {
        $user = User::find($id);
        $name = $user->name;
        return $name;
    }
}
