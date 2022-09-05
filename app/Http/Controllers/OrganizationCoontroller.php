<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationCoontroller extends Controller
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
        $organiztion = new Organization();
        $organiztion->user_id = Auth::id();
        $organiztion->identification_code = $request->identification_code;
        $organiztion->name = $request->name;
        $organiztion->address_l = $request->address_l;
        $organiztion->address_a = $request->address_a;
        $organiztion->region_id = $request->region_id;
        $organiztion->district = $request->district;
        if($request->file('ownership')) 
        {
            $file = $request->file('ownership');
            $filename = time() . '.' . $request->file('ownership')->extension();
            $filePath = public_path() . '/assets/files/form/';
            $file->move($filePath, $filename);
            $organiztion->ownership = $filename;
        }
       
        if($request->file('legal_form')) 
        {
            $file = $request->file('legal_form');
            $filename = time() . '.' . $request->file('legal_form')->extension();
            $filePath = public_path() . '/assets/files/form/';
            $file->move($filePath, $filename);
            $organiztion->legal_form = $filename;
        }
        $organiztion->type_of_economic = $request->type_of_economic;
        $organiztion->head = $request->head;
        $organiztion->number = $request->number;
        // dd($organiztion);
        $organiztion->save();
        return redirect()->back()->with('message', 'წარმატებით აიტვირთა');
        
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
        $organiztion = Organization::findOrFail($id);
        $organiztion->identification_code = $request->identification_code;
        $organiztion->name = $request->name;
        $organiztion->address_l = $request->address_l;
        $organiztion->address_a = $request->address_a;
        $organiztion->region_id = $request->region_id;
        $organiztion->district = $request->district;

        if ($request->hasFile('ownership')) {
            $filePath = public_path() . '/assets/files/form/';
            $destination = $filePath.$organiztion->ownership;
            if (file_exists($destination)) {
                unlink($destination); 
            }
            $file = $request->file('ownership');
            $filename = time() . '.' . $request->file('ownership')->extension();
            $file->move($filePath, $filename);
            $organiztion->ownership = $filename;
        };
        if ($request->hasFile('legal_form')) {
            $filePath = public_path() . '/assets/files/form/';
            $destination = $filePath.$organiztion->ownership;
            if (file_exists($destination)) {
                unlink($destination); 
            }
            $file = $request->file('legal_form');
            $filename = time() . '.' . $request->file('legal_form')->extension();
            $file->move($filePath, $filename);
            $organiztion->ownership = $filename;
        };
        $organiztion->type_of_economic = $request->type_of_economic;
        $organiztion->head = $request->head;
        $organiztion->number = $request->number;
        $organiztion->update();
        return redirect()->back()->with('message', 'წარმატებით განახლდა');
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
