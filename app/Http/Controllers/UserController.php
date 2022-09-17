<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPartnerPreference;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $partnerPreference = UserPartnerPreference::where('user_id', $user->id)->first();
        $expectedIncome = explode(' - ', $partnerPreference->expected_income);
        $minExpectedIncome = $expectedIncome[0];
        $maxExpectedIncome = $expectedIncome[1];

        $suggestions = User::where([ 'manglik' => $partnerPreference->manglik ])->where('gender', '<>', $user->gender)->whereIn('occupation', $partnerPreference->occupation)->whereIn('family_type', $partnerPreference->family_type)->whereBetween('annual_income', [ $minExpectedIncome, $maxExpectedIncome ])->paginate(10);

        return view('suggestions', compact('suggestions'));
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
        //
    }
}
