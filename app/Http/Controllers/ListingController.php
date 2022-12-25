<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
       // dd(request('tag'));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);
    }
    //shown single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //show create form
    public function create(){
        return view('listings.create');
    }

    //store listing data 
    public function store(Request $request){
        //validating a form
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required','email'],
            'tags' => 'required',
            'description' => 'required'

        ]);

        if ($request->hasFile('logo')) {
            //specifying to store the logo image to a folder named logos 
            // In the $formfields[logo] field we are only getting the path of the saved image
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }

        // storing the fileds in db command
        Listing::create($formFields);
        //redirecting to home page with message var as session var
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //show edit form
    public function edit(Listing $listing){
        return view('listings.edit',['listing' => $listing ]);
    }

        //update listing data 
    public function update(Request $request, Listing $listing){
            //validating a form
            $formFields = $request->validate([
                'title' => 'required',
                'company' => ['required'],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required','email'],
                'tags' => 'required',
                'description' => 'required'
            ]);
    
            if ($request->hasFile('logo')) {
                //specifying to store the logo image to a folder named logos 
                // In the $formfields[logo] field we are only getting the path of the saved image
                $formFields['logo'] = $request->file('logo')->store('logos','public');
            }
    
            // storing the existing updated listing 

            $listing->update($formFields);
            //redirecting to home page with message var as session var
            return back()->with('message', 'Listing updated successfully!');
        }
    public function destroy(Listing $listing){
        $listing->delete();
        return Redirect('/')->with('message','Listing deleted successfully');
    }
    

}
 