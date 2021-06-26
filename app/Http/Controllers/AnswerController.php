<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AnswerQuestion;
use Auth;


class AnswerController extends Controller
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
        //
        $request->validate([
            'answer'      => 'required',
            'question_id' => 'required'
        ]);

        // aprint($request->all());

        
        try {
            //code...

            $question              = \App\Models\questions::with(['seekers'])->whereId($request->question_id)->first();
            
            $question->is_answered = 1;
            $question->save();

            $data         =  $request->all();
            $answer       =  new  \App\Models\answers;
            $updateAnswer =  $answer->fill($data)->save();

            $rootUrl                             = url('/');
            $emailData['userName']              = $question->seekers->name;
            $emailData['questionsText']          = $question->question;
            $emailData['mentorName']             = Auth::user()->name;
            $emailData['url']                    = $rootUrl.'/your/questions';
            $emailData['profile_pic']            = ($question->seekers->profile_pic) ? ($question->seekers->profile_pic) : 'userIcon.png';

            if($updateAnswer)
            {
                $sendMail                 = Mail::to($question->seekers->email)->send(new AnswerQuestion($emailData));

            }



        } catch (\Throwable $th) {
            throw $th;
        }

        return back()->with('success', 'Answer added successfully');

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
