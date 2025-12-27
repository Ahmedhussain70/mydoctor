<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * GET /api/questions
     */
    public function index(Request $request)
    {
        $query = Question::with(['specialty', 'answers']);

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->doctor_id) {
            $query->where('doctor_id', $request->doctor_id);
        }

        if ($request->specialty_id) {
            $query->where('specialty_id', $request->specialty_id);
        }

        $questions = $query->latest()->paginate(15);

        return success('Questions retrieved successfully', 200, $questions);
    }

    /**
     * GET /api/questions/{id}
     */
    public function show($id)
    {
        $question = Question::with(['specialty', 'answers'])
            ->find($id);

        if (!$question) {
            return error('Question not found', 404);
        }

        return success('Question retrieved successfully', 200, $question);
    }

    /**
     * POST /api/questions
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'specialty_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer',
            'medical_history' => 'nullable|string',
            'doctor_id' => 'nullable|integer'
        ]);

        $question = Question::create($data);

        return success('Question created successfully', 201, $question);
    }

    /**
     * DELETE /api/questions/{id}
     */
    public function destroy($id)
    {
        $question = Question::find($id);

        if (!$question) {
            return error('Question not found', 404);
        }

        $question->delete();

        return success('Question deleted successfully');
    }
}
