<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\OfferData;
use App\ProfileData;

class UserController extends Controller
{
    //
    protected $username = "";
    protected $ip_addr = "";
    protected $isAdmin = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    public function getUserIpAddr(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
    }
    public function getUserInfo(){
        $userInfo = Auth::user();
        $user = Array();

        $user['isAdmin'] = $this->isAdmin = $userInfo->role_id == 1 ? true : false;
        $user['ip_addr'] = $this->getUserIpAddr();
        $user['username'] = $userInfo->username;

        return (object)$user;
    }
    public function index() {
        $user = $this->getUserInfo();

        if ($this->isAdmin != true) {
            $offers_count = DB::table('offer_datas')->count();
            $profiles_count = DB::table('profile_datas')->count();
            $profiles = DB::table('profile_datas')
                            ->select('*')
                            ->where('created_by', $user->username)
                            ->get();
            $profiles = json_decode(json_encode($profiles), True);

            return view('user.index', ['url' => 'dashboard', 'profiles' => $profiles, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
        }
        else {
            $users_count = DB::table('users')->count();
            $offers_count = DB::table('offer_datas')->count();
            $profiles_count = DB::table('profile_datas')->count();
            $users = User::all()->toArray();

            return view('user.index', ['url' => 'dashboard', 'users' => $users, 'users_count' => $users_count, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
        }
    }
    public function create() {
        // echo 'create';

        return view('user.create', ['url' => 'users']);
    }
    public function store(Request $request) {
        // echo 'store';

        $validator = Validator::make($request->all(), [
            'username'=>'unique:users',
            'email'=>'unique:users',
            'role_id'=>'integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User([
            'username' => $request['username'],
            'email' => $request['email_address'],
            'password' => md5($request['password']),
            'fullname' => $request['fullname'],
            'phone' => $request['phone'],
            'role_id' => $request['role_id']
        ]);
        $user->save();

        echo "<script language='javascript'> history.go(-1) </script>";
    }
    public function show($id) {
        // echo 'show';
        $user = User::find($id);

        return view('user.show', ['url' => 'users', 'user' => $user]);
    }
    public function edit($id) {
        // echo 'edit';
        $user = User::find($id);

        return view('user.edit', ['url' => 'users', 'user' => $user]);
    }
    public function update(Request $request, $id) {
        // echo 'update';

        $validator = Validator::make($request->all(), [
            'username'=>'unique:users',
            'email'=>'unique:users',
            'role_id'=>'integer',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::find($id);
        $user->username = $request->get('username');
        $user->email = $request->get('email_address');
        $user->password = Hash::make($request->get('password'));
        $user->fullname = $request->get('fullname');
        $user->phone = $request->get('phone');
        $user->role_id = $request->get('role_id');
        $user->save();

        echo "<script language='javascript'> history.go(-1) </script>";
    }
    public function destroy($id) {
        // echo 'destroy';
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }
    // show more details
    public function more($type) {
        // echo 'show';
        $user = $this->getUserInfo();

        if ($this->isAdmin != true) {
            $offers_count = DB::table('offer_datas')->count();
            $profiles_count = DB::table('profile_datas')->count();
            if ($type == 1) {
                $profiles = DB::table('profile_datas')
                          ->select('*')
                          ->where('created_by', $user->username)
                          ->get()->toArray();
                $profiles = json_decode(json_encode($profiles), True);
                return view('user.index', ['url' => 'profiles', 'profiles' => $profiles, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
            }
            else if ($type == 2) {
                $offers = DB::table('offer_datas')
                          ->select('*')
                          ->where('created_by', $user->username)
                          ->get();
                $offers = json_decode(json_encode($offers), True);
                return view('user.index', ['url' => 'offers', 'offers' => $offers, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
            }
        }
        else {
            $users_count = DB::table('users')->count();
            $offers_count = DB::table('offer_datas')->count();
            $profiles_count = DB::table('profile_datas')->count();
            if ($type == 0) {
                $users = User::all()->toArray();
                return view('user.index', ['url' => 'users', 'users' => $users, 'users_count' => $users_count, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
            }
            else if ($type == 1) {
                $profiles = ProfileData::all()->toArray();
                return view('user.index', ['url' => 'profiles', 'profiles' => $profiles, 'users_count' => $users_count, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
            }
            else if ($type == 2) {
                $offers = OfferData::all()->toArray();
                return view('user.index', ['url' => 'offers', 'offers' => $offers, 'users_count' => $users_count, 'offers_count' => $offers_count, 'profiles_count' => $profiles_count]);
            }
        }
    }
}
