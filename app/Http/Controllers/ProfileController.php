<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Interviewer_role;
use App\Models\Category;
use App\Models\Region;
use App\Models\Interviewer;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function interviewerProfile()
    {
        $interviewers = Interviewer::where('user_id', Auth::id())->get();
        $categories = Category::all();
        $regions = Region::all();
        // dd($interviewers);
        return view('profile', compact('categories','regions','interviewers'));
    }
    public function addInterviewerProfile(Request $request)
    {
        $interviewer = new Interviewer();
        $interviewer->user_id = Auth::id();
        $interviewer->region_id = $request->region_id;
        $interviewer->category_id = $request->category_id;
        $interviewer->address = $request->address;
        $interviewer->number = $request->number;
        // dd($interviewer);
        $interviewer->save();
        return redirect()->back()->with('message', 'წარმატებით აიტვირთა');
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
