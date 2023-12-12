<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreWagesRequest;
use App\Models\User;
use App\Models\Wages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WagesController extends Controller
{
    public function store(StoreWagesRequest $request)
    {
        try {
            $validateUser = Validator::make($request->all(),
                [
                    'user_id',
                    'active_salary',
                    'previous_salary',
                    
                ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $wages = Wages::create([
                'user_id' => 6,
                'active_salary'=> $request->active_salary,
                'previous_salary'=> $request->previous_salary,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Wages Created Successfully',
                'token' => $wages->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        
    }
}
}