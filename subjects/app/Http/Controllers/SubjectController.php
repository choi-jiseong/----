<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Sugang;
use App\Models\SugangCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SubjectController extends Controller
{
    public function index() {

        // dd($posts);
        return Inertia::render('Subject/container');
    }

    public function index2() {
        $subjects = Subject::latest()->paginate(5);
        // dd($posts);
        return Inertia::render('Subject/container2', ['subjects' => $subjects]);
    }

    public function index3() {

        return Inertia::render('Subject/container3');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'grade' => 'required',
            'explanation' => 'required',
        ]);

        Subject::create([
            'name' => $request->name,
            'grade' => $request->grade,
            'explanation' => $request->explanation
        ]);

        return ;
    }

    public function update(Request $request, $subId) {
        $request->validate([
            'name' => 'required',
            'grade' => 'required',
            'explanation' => 'required',
        ]);
        $subject = Subject::find($subId);
        $subject-> name = $request->name;
        $subject->grade = $request->grade;
        $subject->explanation = $request->explanation;

        $subject->save();

        $subjects = Subject::lastest()->get();

        return Redirect::route('index2');
    }

    public function destroy($subId) {
        $subject = Subject::find($subId);

        $subject->delete();

        return 1;

    }

    public function sugang_check($subId){
        // dd($request);

        $user_id = auth()->user()->id;
        if(Sugang::where('user_id', $user_id)->where('subject_id', $subId)->get()){

        }

        $subject = Subject::find($subId);
        $sugangCheck = SugangCheck::where('subject_id', '=', $subject->id)->where('user_id', '=', auth()->user()->id)->first();
        // dd($like->id);
        if(Auth::user() != null && !$subject->likes_viewers->contains(Auth::user())){
            $subject->likes_viewers()->attach(Auth::user()->id);  //이렇게 하면 pivot테이블에 들어간다
        }else if(Auth::user() != null && $subject->likes_viewers->contains(Auth::user())){
            SugangCheck::find($sugangCheck->id)->delete();
        }

        return SugangCheck::find($sugangCheck->id);

    }
}
