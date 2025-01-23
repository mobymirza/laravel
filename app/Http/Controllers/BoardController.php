<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BoardController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'description' => 'nullable|string|max:200',
        ]);
        $boardExist = DB::table('boards')
            ->where('name', $name)
            ->where('user_id', 2)
            ->exists();
        if ($boardExist) {
            return response()->json([
                'message' => 'UserID 2 cannot create a board with the same name.'
            ],409);
        }
        $board = new Board();
        $board->setName($name);
        $board->setDescription($description);
        $board->setUserId(2);
        $board->save();
        return response()->json(['message' => 'Board created successfully!'], 201);
    }
}
