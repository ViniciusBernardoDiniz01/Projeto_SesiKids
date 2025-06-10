<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class apiController extends Controller
{
    /** 
    *@return JsonResponse
    */

    public function index(): JsonResponse{
        $users = User::get();

        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }
}
