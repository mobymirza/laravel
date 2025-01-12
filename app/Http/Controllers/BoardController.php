<?php

namespace App\Http\Controllers;

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
            ->first();
        if ($boardExist) {
            return response()->json([
                'message' => 'UserID 2 cannot create a board with the same name.'
            ],409);
        }


        DB::table('boards')->insert([
            'name' => $name,
            'description' => $description,
            'user_id' => 2,
        ]);

        return response()->json(['message' => 'Board created successfully!'], 201);
    }
}
