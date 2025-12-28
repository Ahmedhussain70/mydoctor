<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store new answer
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question_id' => 'required',
            'doctor_id' => 'required',
            'answer' => 'required|string',
        ]);

        $answer = Answer::create($data);

        // Update question status
        Question::where('id', $data['question_id'])
            ->update(['status' => 'answered']);

        return success('Answer added successfully', 201, $answer);
    }

    /**
     * Get answers for a question
     */
    public function index($questionId)
    {
        $answers = Answer::with('doctor')
            ->where('question_id', $questionId)
            ->latest()
            ->get();

        return success('Answers retrieved successfully', 200, $answers);
    }
}
