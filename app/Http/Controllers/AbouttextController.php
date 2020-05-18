<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abouttext;

class AbouttextController extends Controller
{
    public function index()
    {
        $abouttexts = Abouttext::all();

        if(!$abouttexts){
            return response()->json([
                'status' => 'failed',
                'message' => 'No abouttexts was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'abouttexts' => $abouttexts
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
        $abouttexts = new Abouttext();
        $abouttexts->fill($inputs);
        $abouttexts->save();

        if(!$abouttexts){
            return response()->json([
                'status' => 'failed',
                'message' => 'No abouttexts was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'abouttexts was added',
            'abouttexts' => $abouttexts 
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
        $abouttexts = Abouttext::where('id', $id)->first();

        if(!$abouttexts){
            return response()->json([
                'status' => 'failed',
                'message' => 'No abouttexts was founded with $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'abouttexts' => $abouttexts 
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
        $abouttexts = Abouttext::where('id', $id)->first();

        $abouttexts->update($inputs);
        $abouttexts->save();
        
        if(!$abouttexts){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not update abouttext with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'abouttexts' => $abouttexts 
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
        $abouttexts = Abouttext::where('id', $id)->delete();

        if(!$abouttexts){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete abouttexts with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'abouttexts is id: $id is deleted'
        ], 200);
    }
}
