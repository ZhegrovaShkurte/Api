<?php

namespace App\Http\Controllers\Api;

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
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required|numeric',
            'is_active' => 'boolean',
        ]);

        $wages = Wages::create($request->all());
        
        return response()->json(['message' => 'Wages created successfully', 'data' => $wages], 201);
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
