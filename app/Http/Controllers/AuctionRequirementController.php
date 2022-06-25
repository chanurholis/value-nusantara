<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Identity_card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class AuctionRequirementController extends Controller
{
    public function identity_card()
    {
        $identity_cards = Identity_card::where('user_id', Auth::user()->id)->first();
        $genders        = ['Laki - laki', 'Perempuan'];
        $provinces      = Province::all();

        if ($identity_cards) {
            $iProvince     = Province::where('id', $identity_cards->province)->first();
            $iCity         = City::where('id', $identity_cards->city)->first();
            $iDistrict     = District::where('id', $identity_cards->district)->first();
            $iVillage      = Village::where('id', $identity_cards->village)->first();

            $identity_cards->province = $iProvince;
            $identity_cards->city     = $iCity;
            $identity_cards->district = $iDistrict;
            $identity_cards->village  = $iVillage;
        } else {
            $genders = ['Laki - laki', 'Perempuan'];
            $provinces      = Province::all();

            return view('auction-requirement.identity-cards.edit', [
                'genders'   => $genders,
                'provinces' => $provinces
            ]);
        }

        return view('auction-requirement.identity-cards.index', [
            'model'     => $identity_cards,
            'genders'   => $genders,
            'provinces' => $provinces
        ]);
    }

    public function identity_card_update(Request $request, Identity_card $identity_card)
    {
        $request->validate([
            'nik'            => 'required|numeric|unique:identity_cards',
            'place_of_birth' => 'required|string',
            'date_of_birth'  => 'required|date',
            'gender'         => 'required',
            'profession'     => 'required|string',
            'province'       => 'required',
            'city'           => 'required',
            'district'       => 'required',
            'village'        => 'required',
            'photo'          => 'required'
        ]);

        $data = [];
        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        if (!$request->photo) {
            $data['photo'] = $identity_card->photo;
        } else {
            $data['photo'] = $request->photo;
            $data['photo'] = time() . '_' . Auth::user()->name . '.' . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('identityCardFile'), $data['photo']);
        }

        $data['id']            = Uuid::uuid4()->getHex();
        $data['user_id']       = Auth::user()->id;

        $identity_card->create($data);

        return redirect(route('user.identity-card'))->with('status', 'KTP berhasil dilengkapi!');
    }

    public function city(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($cities);
    }

    public function district(Request $request)
    {
        $districts = District::where('city_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($districts);
    }

    public function village(Request $request)
    {
        $districts = Village::where('district_id', $request->get('id'))->pluck('name', 'id');

        return response()->json($districts);
    }
}
