<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\QuestionnaireList;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->role_id;
        $organization = Organization::where('user_id', Auth::id())->first();
        $organiozationList = Organization::orderby('id', 'DESC')->get();
        $questionnaires = Questionnaire::all();
        $questionnaireListAll = QuestionnaireList::orderby('id','DESC')->get();
        $organiozationListInterviewer = Organization::orderby('id', 'DESC')->where('region_id', auth()->user()->region_id)->get();
        $interviewerCategory = Interviewer::where('user_id', Auth::id())->first();
       
        
        // dd($questionnaireList);
        if ($role == 1) {
            $users = User::all();
            $regions = Region::all();
            return view('admin/admin', compact('organiozationList','questionnaires',
            'questionnaireListAll','users','regions'));
        }elseif($role == 2)
        {
            return view('home', compact('organization','questionnaireListAll', 'questionnaires'));
        }
        elseif($role == 3)
        $questionnaireList = QuestionnaireList::orderby('id','DESC')->where('category_id', $interviewerCategory->category_id)->get();
        {
            return view('interviewer/interviewerHome', compact('organiozationListInterviewer','questionnaires','questionnaireList',
        'interviewerCategory'));
        }
        
       
    }

}
