<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ProfileData;

class ProfileDataController extends Controller
{
	//
    public function index() {
        // echo 'index';
	}
	public function create() {
		// echo 'create';

        return view('profile.create', ['url' => 'profiles']);
	}
	public function store(Request $request) {
        // echo 'store';
        $user = app('App\Http\Controllers\UserController')->getUserInfo();

        $request->validate([
            'email'=>'unique:users',
        ]);
        $profile = new ProfileData([
			'name' => $request['name'],
			'username' => $request['username'],
			'email_address' => $request['email_address'],
			'password' => md5($request['password']),
			'birthday' => $request['birthday'],
			'address' => $request['address'],
			'city' => $request['city'],
			'state' => $request['state'],
			'country' => $request['country'],
			'zip_code' => $request['zip_code'],
			'phone' => $request['phone'],
			'created_by' => $user->username
        ]);
        $profile->save();

        echo "<script language='javascript'> history.go(-1) </script>";
	}
	public function show($id) {
        // echo 'show';
        $profile = ProfileData::find($id);

        return view('profile.show', ['url' => 'profiles', 'profile' => $profile]);
	}
     public function edit($id) {
        // echo 'edit';
        $profile = ProfileData::find($id);

        return view('profile.edit', ['url' => 'profiles', 'profile' => $profile]);
	}
	public function update(Request $request, $id) {
		// echo 'update';
		$user = app('App\Http\Controllers\UserController')->getUserInfo();

        $profile = ProfileData::find($id);
        $profile->name = $request->get('name');
        $profile->username = $request->get('username');
        $profile->email_address = $request->get('email_address');
        $profile->password = md5($request->get('password'));
        $profile->birthday = $request->get('birthday');
        $profile->address = $request->get('address');
        $profile->city = $request->get('city');
        $profile->country = $request->get('country');
        $profile->zip_code = $request->get('zip_code');
        $profile->phone = $request->get('phone');
        $profile->created_by = $user->username;
		$profile->save();

        echo "<script language='javascript'> history.go(-1) </script>";
	}
	public function destroy($id) {
		// echo 'destory';
        $profile = ProfileData::findOrFail($id);
        $profile->delete();

        return redirect()->back();
	}
	public function find($id) {
		$offers = DB::table('offer_datas')
				->select('*')
				->where('profile_data_id', $id)
				->get();
		$offers = json_decode(json_encode($offers), True);

        return view('offer.index', ['url' => 'profiles', 'offers' => $offers]);
    }
}
