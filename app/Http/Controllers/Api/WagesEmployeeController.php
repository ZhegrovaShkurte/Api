<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreWagesRequest;
use App\Models\Wages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function store(StoreWagesRequest $request)
    {
        try {
            $wages = Wages::create([
                'user_id' => $request->input('user_id'),
                'amount' => $request->input('amount'),
                'is_active' => 'boolean',

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
