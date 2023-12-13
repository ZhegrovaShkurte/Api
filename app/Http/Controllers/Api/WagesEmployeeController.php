<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Wages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWagesRequest;
use Illuminate\Support\Facades\Validator;

class WagesEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isActive = $request->input('is_active', true);
        $wages = Wages::where('is_active', $isActive)->get();

        return response()->json(['wages' => $wages, 'isActive' => $isActive]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required',
                'amount' => 'required|numeric',
                'is_active' => 'boolean',
            ]);
        
            $wages = Wages::create($request->all());
        
            return response()->json(['message' => 'Wages created successfully', 'data' => $wages], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating wages', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::find($id);
        
            if ($user) {
                $wages = $user->wages;
                return response()->json(['wages' => $wages]);
            } else {
                return response()->json(['error' => 'User not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while processing the request'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wages = Wages::find($id);
        $wages->delete();

        $data =
            [
                'status' => 200,
                'message' => "data deleted successfully"
            ];

        return response()->json($data, 200);
    }
}
