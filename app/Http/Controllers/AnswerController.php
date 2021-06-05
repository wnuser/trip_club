<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

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

     public function addlikes(Request $request)
     {
        //  aprint($request->all());
         $answerId  = $request->answerId;
         $userId    = Auth::user()->id;

         $existLike   = \App\Models\likes::whereUserId($userId)->first();
         if($existLike) {

         } else {
             $data['answer_id']  = $answerId;
             $data['user_id']    = $userId;
             $data['likes']      = 1;

             $like = new \App\Models\likes;
             $like->fill($data)->save();

         }

         $totalLikes   = \App\Models\likes::whereAnswerId($answerId)->whereUserId($userId)->count();
         return $totalLikes;

     }







    public function store(Request $request)
    {
        //
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required'
        ]);

        // aprint($request->all());

        
        try {
            //code...

            $question   = \App\Models\questions::whereId($request->question_id)->first();
            $question->is_answered = 1;
            $question->save();

            $data  = $request->all();
            $answer   = new  \App\Models\answers;
            $answer->fill($data)->save();

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
