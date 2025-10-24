<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
   public function uploadImage(Request $request)
    {
    //    // Validate the incoming request to ensure fields and image are provided correctly
    //     $validated = $request->validate([
    //         'title' => 'required|string|max:255',  // Ensure title is required, a string, and not more than 255 characters
    //         'category' => 'required|string',       // Ensure category is provided and is a string
    //         'content' => 'required|string',        // Ensure content is provided and is a string
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image (type and size)
    //     ]);

    //     // Check if file is uploaded and valid
    //     if ($request->hasFile('image') && $request->file('image')->isValid()) {
    //         // Get uploaded file
    //         $file = $request->file('image');

    //         // Generate unique file name based on timestamp and original extension
    //         $fileName = time() . '.' . $file->getClientOriginalExtension();

    //         // Store file in the public 'uploads' directory
    //         $filePath = $file->storeAs('uploads', $fileName, 'public');  // Saves file in storage/app/public/uploads

    //         // Create a new story record in the database
    //         $story = Story::create([
    //             'title' => $request->input('title'),
    //             'category' => $request->input('category'),
    //             'content' => $request->input('content'),
    //             'image' => $filePath,  // Store the file path in the 'image' column
    //         ]);

    //         // Redirect to home or another page with success message
    //         return redirect('/')
    //             ->with('success', 'Story created successfully!');
    //     }

    //     // If image upload fails or not valid, redirect back with error message
    //     return redirect()
    //         ->back()
    //         ->with('error', 'File upload failed. Please try again.')
    //         ->withInput();

        $request->validate([
                'title' => 'required|string|max:255',  // Ensure title is required, a string, and not more than 255 characters
                'category' => 'required|string',       // Ensure category is provided and is a string
                'content' => 'required|string',        // Ensure content is provided and is a string
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg', 
            ]);
            
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('profiles', 'public');
            }

            // return response()->json([
            //     'data' => $path
            // ], 201);
            // dd($request);

            $story = Story::create([
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'content' => $request->input('content'),
                'image' => $path,  // Store the file path in the 'image' column
            ]);

            return redirect('/')
                ->with('success', 'Story created successfully!');
    }

    public function index(Request $request)
    {
        // Get category from the request, default to 'Familia' if not provided
        $category = $request->get('category', 'Familia');
        
        // Fetch stories by category
        $stories = Story::where('category', $category)->get();
        // dd($stories);
        
        // Pass the data to the view
        return view('dashboard', compact('stories', 'category'));
    }

    public function welcome(Request $request)
    {
        // Get category from the request, default to 'Familia' if not provided
        $category = $request->get('category', 'Familia');
        
        // Fetch stories by category
        $stories = Story::where('category', $category)->get();
        // dd($stories);
        
        // Pass the data to the view
        return view('welcome', compact('stories', 'category'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('stories.show', compact('story'));
    }

}

// php artisan storage:link
