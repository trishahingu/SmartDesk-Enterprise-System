<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentApiController extends Controller
{
    public function index()
    {
        return response()->json(
            Comment::with(['user','task'])->latest()->get()
        );
    }
}