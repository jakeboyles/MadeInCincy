<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Company;
use Illuminate\Http\Request;
use Mail;
use App\Category;

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
        $types = Category::all();
        return view('pages.home', ['companies'=>$companies, 'types'=>$types]);
    }

    public function getCompanies()
    {
        $companies = Company::where('status',1)->with('category','jobs')->get();

        return response()->json($companies);
    }


    public function getCompaniesByType($id)
    {
        $companies = Company::where('status',1)->where('category_id',$id)->with('category','jobs')->get();

        return response()->json($companies);
    }


    public function getBySearch($request)
    {
        $companies = Company::search($request)
            ->with('category','jobs')
            ->get();

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
            'type' => 'required',
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
        $company->url = $request->url;
        $company->category_id = $request->type;
        $company->save();

        $data = array(
        'name' => $company->name,
        );

        Mail::send('email.new', $data, function ($message) {

            $message->from('jake@jibdesigns.com', 'New Listing');

            $message->to('jake@jibdesigns.com')->subject('New Listing');

        });

        return Redirect('/')->with('message', 'Thanks for adding a listing. It will show on the map once it is approved!');
    }
}