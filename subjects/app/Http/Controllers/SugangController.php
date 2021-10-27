<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Sugang;
use App\Models\SugangCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SugangController extends Controller
{
    public function suganghagi($subId) {

        $subject = Subject::find($subId);

        Sugang::create([
            'user_id' => auth()->user()->id,
            'subject_id' => $subject->id
        ]);

        return true;
    }


}
