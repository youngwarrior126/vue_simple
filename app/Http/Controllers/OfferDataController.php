<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OfferData;

class OfferDataController extends Controller
{
    //
	public function index() {
		// echo 'index';
	}
	public function create() {
		// echo 'create';

        return view('offer.create', ['url' => 'offers']);
	}
	public function store(Request $request) {
		// echo 'store';
		$user = app('App\Http\Controllers\UserController')->getUserInfo();
		$ip = app('App\Http\Controllers\UserController')->getUserIpAddr();

        $offer = new OfferData([
			'offer_name' => $request['offer_name'],
			'offer_link' => $request['offer_link'],
			'ip' => $ip,
			'user_agent' => $request['user_agent'],
			'screen_resolution' => $request['screen_resolution'],
			'profile_data_id' => $request['profile_data_id'],
			'created_by' => $user->username
        ]);
        $offer->save();

        echo "<script language='javascript'> history.go(-1) </script>";
	}
	public function show($id) {
		// echo 'show';
        $offer = OfferData::find($id);

        return view('offer.show', ['url' => 'offers', 'offer' => $offer]);
	}
	public function edit($id) {
		// echo 'edit';
        $offer = OfferData::find($id);

        return view('offer.edit', ['url' => 'offers', 'offer' => $offer]);
	}
	public function update(Request $request, $id) {
		// echo 'update';
		$user = app('App\Http\Controllers\UserController')->getUserInfo();

        $offer = OfferData::find($id);
        $offer->offer_name = $request->get('offer_name');
        $offer->offer_link = $request->get('offer_link');
        $offer->ip = $user->ip_addr;
        $offer->user_agent = $request->get('user_agent');
        $offer->screen_resolution = $request->get('screen_resolution');
        $offer->profile_data_id = $request->get('profile_data_id');
        $offer->created_by = $user->username;
		$offer->save();

        echo "<script language='javascript'> history.go(-1) </script>";
	}
	public function destroy($id) {
		// echo 'destroy';

        $offer = OfferData::findOrFail($id);
        $offer->delete();

        return redirect()->back();
	}
}
