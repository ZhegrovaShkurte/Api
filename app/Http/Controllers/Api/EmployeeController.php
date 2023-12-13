<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        $data = [
            'status' => 200,
            'user' => $user
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(UpdateEmployeeRequest $request, $id)
    {
        try {
            $validated = $request->validated();
            $user = User::find($id);

            $user->update($validated);

            $data = [
                'status' => 200,
                'message' => 'Data updated successfully',
            ];

            return response()->json($data, 200);

        } catch (\Exception $e) {
            $data = [
                'status' => 500,
                'message' => 'Error updating data: ' . $e->getMessage(),
            ];

            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $data =
            [
                'status' => 200,
                'message' => "data deleted successfully"
            ];

        return response()->json($data, 200);
    }
}
