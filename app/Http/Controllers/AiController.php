<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AIService;

class AIController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {
        return view('ai');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string'
        ]);

        $result = $this->aiService->generateContent(
            $request->prompt
        );

        return back()->with([
            'result' => $result
        ]);
    }
}