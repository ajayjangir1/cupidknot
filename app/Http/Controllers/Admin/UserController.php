<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc');
        // dd($request->all());
        $requestData = $request->all();

        if ( $request->method() == "POST" ) {
            if ( array_key_exists('gender', $request->all()) && !empty($request->gender) ) {
                $users = $users->where('gender', $request->gender);
            }
            if ( array_key_exists('family_type', $request->all()) && !empty($request->family_type) ) {
                $users = $users->where('family_type', $request->family_type);
            }
            if ( array_key_exists('manglik', $request->all()) && !empty($request->manglik) ) {
                $users = $users->where('manglik', $request->manglik);
            }
            if ( array_key_exists('income_range', $request->all()) && !empty($request->income_range) && $request->income_range != "100000 - 100000" )  {
                $range = explode(' - ', $request->income_range);
                $minIncome = $range[0];
                $maxIncome = $range[1];

                $requestData['minIncome'] = $minIncome;
                $requestData['maxIncome'] = $maxIncome;

                $users = $users->whereBetween('annual_income', [ $minIncome, $maxIncome ]);
            }
            if ( array_key_exists('age', $request->all()) && !empty($request->age) )  {
                $dobYear = date("Y-m-d", strtotime("-".$request->age." years"));
                // dd($dobYear);
                $users = $users->whereYear('dob', $dobYear);
            }
        }

        $users = $users->paginate(10);

        return view('admin.users.index', compact('users', 'requestData'));
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
