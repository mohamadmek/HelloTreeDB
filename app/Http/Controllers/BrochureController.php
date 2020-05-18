<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brochure;

class BrochureController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brochures = Brochure::all();

        if(!$brochures){
            return response()->json([
                'status' => 'failed',
                'message' => 'No brochures was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'brochures' => $brochures
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $brochures = new Brochure();
        $brochures->fill($inputs);
        $brochures->save();

        if(!$brochures){
            return response()->json([
                'status' => 'failed',
                'message' => 'No brochures was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'brochures was added',
            'brochures' => $brochures 
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brochures = Brochure::where('id', $id)->first();

        if(!$brochures){
            return response()->json([
                'status' => 'failed',
                'message' => 'No brochures was founded with $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'brochures' => $brochures 
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $inputs = $request->all();
        return $inputs;
        $brochures = Brochure::where('id', $id)->first();

        $brochures->update($inputs);
        $brochures->save();
        
        if(!$brochures){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not update brochures with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'brochures' => $brochures 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brochures = Brochure::where('id', $id)->delete();

        if(!$brochures){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete brochures with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'brochures is id: $id is deleted'
        ], 200);
    }
}
