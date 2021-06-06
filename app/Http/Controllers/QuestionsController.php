<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $publicQuestions    =  \App\Models\questions::with(['seekers', 'answers.answerMentor'])->whereIsPrivate(0)->orderBy('id', 'DESC')->paginate(10);
        // aprint($publicQuestions->toArray());
        return view('allquestions', compact('publicQuestions'));
    }

    /**
     * function for asked questions from public modal 
     */
    public function askedQuestion(Request $request)
    {
        // aprint($request->all());
        $lastChar  =  substr($request->quetion, -1);
        $result    =  strcmp($lastChar, '?');
        if($result == 0)
        {
            $question =  substr($request->quetion, 0, -1);
        } else {
            $question  = $request->quetion;
        }
        $slug      =  str_slug($question);

        
        if($request->mentor_type) : 
            $mentor_type   = $request->mentor_type;
            return redirect('/mentors/'.$mentor_type);
        else:
            $data['question']   = $request->quetion;
            $data['seeker_id']  = Auth::user()->id;
            $data['is_private'] = 0;
            $data['slug']       = $slug;
            $data['topic_id']   = $request->topic_id;

            $question = new \App\Models\questions;
            $question->fill($data)->save();

            return back()->with('success', 'Your question added successfully');
            
        endif;
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
        // aprint($request->all());
        $request->validate([
            'question' => 'required',
        ]);


        $lastChar  =  substr($request->question, -1);
        $result    =  strcmp($lastChar, '?');
        if($result == 0)
        {
            $question =  substr($request->question, 0, -1);
        } else {
            $question  = $request->question;
        }
        $slug      =  str_slug($question);




        // $question  = $request->question;
        // echo $question;
        // exit;

        $data  = $request->all();
        $data['slug']  = $slug;
        if(isset($data['seeker_id'])) {
            $data['is_private']  =  config('constants.QUESTIONSTATUS.ISPRIVATE');
    
        } else {
            $data['is_private']  =  config('constants.QUESTIONSTATUS.ISPUBLIC');

        }
        $questions = new \App\Models\questions;
        $questions->fill($data)->save();
        return back()->with('success', 'Your question added successfully');
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
