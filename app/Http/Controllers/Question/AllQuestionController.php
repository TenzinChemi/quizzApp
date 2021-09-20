<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllQuestionController extends Controller
{
    public function index(){
        $subject = Subject::all();
        return view('question.questions',[
            'subjects' => $subject,
        ]);
    }

    public function getSubjectCategory(Request $request){
        $subjectID = $request->post('subjectID');
        // $subjectCategory = SubjectCategory::where('subjects_id',$subjectID)->get();
        echo $subjectCategory = DB::table('subject_categories')->where('subjects_id',$subjectID)->get();

        $html='<option value="">Select Subject</option>';
        foreach($subjectCategory as $list){
            $html.='<option value="'.$list->id.'">'.$list->topic.'</option>';
        }
        echo $html;
    }

    public function getQuestion(Request $request){
        $subjectCategoryID = $request->post('subjectCategoryID');
        // $subjectCategory = SubjectCategory::where('subjects_id',$subjectID)->get();
        $question = DB::table('questions')->where('subject_categoryId',$subjectCategoryID)->get();

        $html='<option value="">Select Question</option>';
        foreach($question as $list){
            $html.='<option value="'.$list->id.'">'.$list->question.'</option>';
        }
        echo $html;
    }


}
