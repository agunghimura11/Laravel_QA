<?php

namespace App\Http\Controllers;

use App\Question_model;
use Illuminate\Http\Request;

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
        $questions = Question_model::latest()->paginate(5);

        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = new Question_model();

        return view('questions.create', compact('question'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function show(Question_model $questionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Question_model $questionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question_model $questionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question_model $questionModel)
    {
        //
    }
}
