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
        $publicQuestions    =  \App\Models\questions::with(['seekers', 'answers.answerMentor'])->whereIsPrivate(0)->orderBy('id', 'DESC')->get();
        // aprint($publicQuestions->toArray());
        return view('allquestions', compact('publicQuestions'));
    }

    /**
     * function for asked questions from public modal 
     */
    public function askedQuestion(Request $request)
    {
        // aprint($request->all());
        if($request->mentor_type) : 
            $mentor_type   = $request->mentor_type;
            return redirect('/mentors/'.$mentor_type);
        else:
            $data['question']   = $request->quetion;
            $data['seeker_id']  = Auth::user()->id;
            $data['is_private'] = 0;

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

        $data  = $request->all();
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
