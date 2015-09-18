<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Company;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * Show the profile for the given user. Yay
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('pages.home', ['companies'=>$companies]);
    }

    public function getCompanies()
    {
        $companies = Company::where('status',1)->get();

        return response()->json($companies);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:companies|max:255',
            'description' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'url' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator->errors());
        }

        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->lat = $request->lat;
        $company->long = $request->long;
        $company->status = NULL;
        $company->save();

        return Redirect('/')->with('message', 'Thanks for adding a listing. It will show on the map once it is approved!');
    }
}