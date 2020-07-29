<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question_model;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', 'Your question has been submit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function show(Question_model $question)
    {
        //
        $question->increment('views');
        
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Question_model $question)
    {
        // $this->authorize("update", $question);
        // return view('questions.edit', compact('question'));

        if(\Gate::allows('update-question', $question)) {
            return view('questions.edit', compact('question'));
        }
        abort(403, 'Access denied');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question_model $question)
    {
        $this->authorize("update", $question);
        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question_model $questionModel)
    {
        $this->authorize("delete", $questionModel);
        $questionModel->delete();

        return redirect('/questions')->with('success', 'Delete Success');
        //
    }
}
