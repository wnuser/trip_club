<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mail\AskedQuestion;
use Illuminate\Support\Facades\Mail;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($topicId = false)
    {
        //
        if($topicId) :
            $publicQuestions    =  \App\Models\questions::with(['seekers', 'answers.answerMentor.cityRelation', 'answers.answerLikes'])->whereTopicId($topicId)->whereIsPrivate(0)->orderBy('id', 'DESC')->paginate(10);
        else:
            $publicQuestions    =  \App\Models\questions::with(['seekers', 'answers.answerMentor', 'answers.answerLikes'])->whereIsPrivate(0)->orderBy('id', 'DESC')->paginate(10);
        endif;

            $randamQuestions    =  \App\Models\questions::with(['seekers', 'answers.answerMentor', 'answers.answerLikes'])->whereIsPrivate(0)->orderBy('id', 'DESC')->skip(5)->take(10)->get();
        // aprint($publicQuestions->toArray());
        return view('allquestions', compact('publicQuestions', 'randamQuestions'));
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

        
        if($request->topic_type == 'private') : 
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
     * saving questions which are asked privatly 
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
        // aprint($data);
        $questions    =  new \App\Models\questions;
        $saveQuestion =  $questions->fill($data)->save();

        if($saveQuestion) {
            $userData            = \App\User::whereId($data['mentor_id'])->first();
            $root_url            = url('/');
            $emailData['name']        = $userData->name;
            $emailData['email']       = $userData->email;
            $emailData['seekerName']  = Auth::user()->name;
            $emailData['domain']      = config('role.MENTORSTITLE.'.$userData->mentor_type);
            $emailData['url']         = $root_url.'/new/questions';
            $emailData['profile_pic'] = ($userData->profile_pic) ? ($userData->profile_pic) : 'userIcon.png';
            $sendMail                 = Mail::to($userData->email)->send(new AskedQuestion($emailData));

        }

        // aprint($emailData);


        return back()->with('success', 'Your question added successfully');
    }


    /**
     * details of single question 
     */
    public function singleQuestion($slug)
    {
        $questionDetails   = \App\Models\questions::with(['seekers', 'answers.answerMentor'])->whereSlug($slug)->first();
        $topicId           = $questionDetails->topic_id;
        $relatedQuestions  = \App\Models\questions::whereTopicId($topicId)->whereIsPrivate(0)->orderBy('id', 'DESC')->take(25)->get();
        // aprint($questionDetails);
        return view('single_question', compact('questionDetails', 'relatedQuestions'));

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
