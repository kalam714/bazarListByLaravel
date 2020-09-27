<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;

class ListingController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('listing')->with('listings',$user->listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'items' =>'required',
            'amount' =>'required',
            'estimated_cost' =>'required',
          ]);
          $listing=new Listing();
          $listing->items=$request->input('items');
          $listing->amount=$request->input('amount');
          $listing->estimated_cost=$request->input('estimated_cost');
          $listing->user_id=auth()->user()->id;
          $listing->save();
          return redirect('/listing');
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
        $listing=Listing::find($id);
        return view('edit')->with('listing',$listing);
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
        $this->validate($request,[
            'items' =>'required',
            'amount' =>'required',
            'estimated_cost' =>'required',
          ]);
          $listing=Listing::find($id);
          $listing->items=$request->input('items');
          $listing->amount=$request->input('amount');
          $listing->estimated_cost=$request->input('estimated_cost');
          $listing->user_id=auth()->user()->id;
          $listing->update();
          return redirect('/listing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing=Listing::find($id);
        $listing->delete();
        return redirect('/listing');
    }
}
