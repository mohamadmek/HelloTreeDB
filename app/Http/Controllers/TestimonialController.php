<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Testimonial;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        if(!$testimonials){
            return response()->json([
                'status' => 'failed',
                'message' => 'No testimonial was founded'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'testimonials' => $testimonials
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
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $testimonials = new Testimonial();
        $testimonials->name = $request->input('name');
        $testimonials->quote = $request->input('quote');
        $testimonials->text = $request->input('text');
        $testimonials->image = $fileNameToStore;
        $testimonials->save();

        if(!$testimonials){
            return response()->json([
                'status' => 'failed',
                'message' => 'No testimonials was added'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'testimonials was added',
            'testimonials' => $testimonials 
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
        $testimonials = Testimonial::where('id', $id)->first();

        if(!$testimonials){
            return response()->json([
                'status' => 'failed',
                'message' => 'No testimonials was founded with $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'testimonials' => $testimonials 
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
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->input('name');
        $testimonial->quote = $request->input('quote');
        $testimonial->text = $request->input('text');

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
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);

            $testimonial->image = $fileNameToStore;
        }
        $testimonial->save();   // if(!$testimonials){
            
            return response()->json([
                'status' => 'failed',
                'message' => 'could not update testimonials with id $id'  
            ], 500);
        
        return response()->json([
            'status' => 'success',
            'testimonials' => $testimonials 
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
        $testimonials = Testimonial::where('id', $id)->delete();

        if(!$testimonials){
            return response()->json([
                'status' => 'failed',
                'message' => 'could not delete testimonials with id $id'  
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'testimonials is id: $id is deleted'
        ], 200);
    }
}
