<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Models\QuestionnaireBody;
use App\Models\QuestionnaireList;
use App\Models\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Scheduling\Schedule;

class QuestionnairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $organization_id, $slug)
    {
        $organization = Organization::findOrFail($organization_id);
        // dd($organization);
        $questionnaireList = QuestionnaireList::findOrFail($id);
        $organizations = Organization::where('user_id', Auth::id())->get();
        $questionnaires = Questionnaire::orderBy('id', 'DESC')->where('user_id', Auth::id())->get();
        $adminQuestionnaires = Questionnaire::orderBy('id', 'ASC')->get();
        $countQuestionnaire = Questionnaire::where('user_id', Auth::id())->count();
        $questionnaireBody = QuestionnaireBody::all();
        $regions = Region::all();
        return view('allQuestionnaire/questionnaire', compact('organizations', 'organization', 'questionnaires',
        'questionnaireList','countQuestionnaire','questionnaireBody','adminQuestionnaires','regions'));
    }

    public function questionnaire_3($id, $organization_id, $slug)
    {
        $organization = Organization::findOrFail($organization_id);
        // dd($organization);
        $questionnaireList = QuestionnaireList::findOrFail($id);
        $organizations = Organization::where('user_id', Auth::id())->get();
        $questionnaires = Questionnaire::orderBy('id', 'DESC')->where('user_id', Auth::id())->get();
        $adminQuestionnaires = Questionnaire::orderBy('id', 'ASC')->get();
        $countQuestionnaire = Questionnaire::where('user_id', Auth::id())->count();
        $questionnaireBody = QuestionnaireBody::all();
        $regions = Region::all();
        return view('allQuestionnaire/questionnaire', compact('organizations', 'organization', 'questionnaires',
        'questionnaireList','countQuestionnaire','questionnaireBody','adminQuestionnaires','regions'));
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
        $data = $request->all();
        $organization_id = Organization::where('user_id', Auth::id())->first();
        (int)$questionnaire_list_id = $request->questionnaire_list_id; 
        $questionnaire = new Questionnaire();
        $questionnaire->user_id = Auth::id();
        $questionnaire->cpa_kode = $request->cpa_kode; 
        $questionnaire->product_name = $request->product_name; 
        $questionnaire->organization_id = $organization_id->id;
        $questionnaires = Questionnaire::all();
        if ($questionnaires) {
            foreach ($questionnaires as $question) {
                $question_list_id = $question->questionnaire_list_id;
                if ($question->organization_id === $organization_id->id) {
                    if ((int)$questionnaire_list_id !== $question_list_id && $question_list_id  !== 0) {
                        $questionnaire->questionnaire_list_id = $questionnaire_list_id;
                    }else{
                        $questionnaire->questionnaire_list_id = 0;
                    }
                }else{
                    $questionnaire->questionnaire_list_id = $questionnaire_list_id;
                }
            }
        } else {
            $questionnaire->questionnaire_list_id = $questionnaire_list_id;
        }
        
        // dd($questionnaire);
        $questionnaire->save();
        if (count($data ['product_type']) > 0) {
            foreach ($data ['product_type'] as $key => $value) {
                $data2= array(
                            'questionnaire_id' => $questionnaire->id,
                            'product_type' => $data ['product_type'][$key],
                            'unit' => $data ['unit'][$key],
                            'base_month' => $data ['base_month'][$key],
                            'previous_month' => $data ['previous_month'][$key],
                            'current_month' => $data ['current_month'][$key],
                            'comment' => $data ['comment'][$key],
                        );
                        QuestionnaireBody::create($data2);
            }
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questionnaire = Questionnaire::findOrFail($id);
        return view('table', compact('questionnaire'));
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
        $data = $request->all();
        $questionnaire = Questionnaire::with('questionnairebody')->findOr($id);
        QuestionnaireBody::where('questionnaire_id', $id)->delete();
        $questionnaire->user_id = Auth::id();
        $questionnaire->cpa_kode = $request->cpa_kode; 
        $questionnaire->product_name = $request->product_name; 
        $questionnaire->update();
        if ($request->product_type) {
            foreach ($data ['product_type'] as $key => $value) {
                $data2= array(
                            'questionnaire_id' => $questionnaire->id,
                            'product_type' => $data ['product_type'][$key],
                            'unit' => $data ['unit'][$key],
                            'base_month' => $data ['base_month'][$key],
                            'previous_month' => $data ['previous_month'][$key],
                            'current_month' => $data ['current_month'][$key],
                            'comment' => $data ['comment'][$key],
                        );
                        QuestionnaireBody::create($data2);
            }
        }
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
        $questionnaire = Questionnaire::with('questionnairebody')->findOr($id);
        QuestionnaireBody::where('questionnaire_id', $id)->delete();
        $questionnaire->delete();
        return redirect()->back()->with('message', 'წარმატებით წაიშალა');
    }
}
