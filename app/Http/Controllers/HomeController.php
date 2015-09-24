<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Company;
use Illuminate\Http\Request;
use Mail;
use App\Category;
use App\Person;

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
        $companies = Company::where('status',1)->with('category','jobs','people')->get();

        return response()->json($companies);
    }


    public function getCompaniesByType($id)
    {
        $companies = Company::where('status',1)->where('category_id',$id)->with('category','jobs','people')->get();

        return response()->json($companies);
    }

    public function getCompaniesWithJobs()
    {
        $companies = Company::where('status',1)->with('category','jobs','people')->get();

        $companiesWithJobs = [];

        foreach($companies as $company)
        {
            if($company->jobs()->count()>0)
            {
                array_push($companiesWithJobs,$company);
            }
        }

        return response()->json($companiesWithJobs);
    }


    public function getBySearch($request)
    {
        $request = urldecode($request);
        $companies = Company::search($request)
            ->with('category','jobs','people')
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


    public function personStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'twitter' => '',
            'linkedin' => '',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator->errors());
        }

        $person = new Person();
        $person->name = $request->name;
        $person->twitter = $request->twitter;
        $person->linkedin = $request->linkedin;
        $person->company_id = $request->company_id;
        $person->save();

        $data = array(
        'name' => $person->name,
        );

        Mail::send('email.new', $data, function ($message) {

            $message->from('jake@jibdesigns.com', 'New Person');

            $message->to('jake@jibdesigns.com')->subject('New Person');

        });

        return Redirect('/')->with('message', 'Thanks for adding!');

    }
}