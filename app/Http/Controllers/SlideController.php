<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Illuminate\Support\Facades\Storage;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();

        if(!$slides){
            return response()->json([
                'status' => 'failed',
                'message' => 'No slide was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'slides' => $slides
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
        // Handle file upload
        if($request->hasFile('image')) {
            // Get Filename with extension
            $filenameWithExt  = $request->file('image')->getClientOriginalName();
            // Get Just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the image
            $path = $request->file('image')->storeAs('images', $fileNameToStore);
        } else {
            $fileNameToStore = time().'noimage.jpg';
        }


        $inputs = $request->all();
        $slide = new Slide();
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');
        $slide->image = $fileNameToStore;
        $slide->save();

        if(!$slide){
            return response()->json([
                'status' => 'failed',
                'message' => 'No slide was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'slide was added',
            'slide' => $slide 
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
        $slide = Slide::where('id', $id)->first();

        if(!$slide){
            return response()->json([
                'status' => 'failed',
                'message' => 'No slide was founded with $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'slide' => $slide 
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
        // dd($request->get('title'));
        // dd(request()->all());

        $slide = Slide::find($id);
        $slide->title = $request->input('title');
        $slide->description = $request->input('description');

        // Handle file upload
        if($request->hasFile('image')) {
            // Get Filename with extension
            $filenameWithExt  = $request->file('image')->getClientOriginalName();
            // Get Just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload the image
            $path = $request->file('image')->storeAs('images', $fileNameToStore);

            $slide->image = $fileNameToStore;
        }
        $slide->save();
                        
        if(!$slide){
            return response()->json([
                'status' => 'failed',
                'message' => `could not update slide with id $id`  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'slide' => $slide 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $slide = Slide::where('id', $id);
        // Storage::delete($request->input('image'));
        // // Storage::disk('public')->delete(`/images/` . $request->input('image'));
        // $image_path = 'storage'.public_path().'/images/'.$request->input('image');
        $image_path = 'images/'.$request->input('image');
        unlink($image_path);
        $slide->delete();
        if(!$slide){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete slide with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'slide is id: $id is deleted'
        ], 200);
    }
}
