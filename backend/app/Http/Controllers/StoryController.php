<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
   public function uploadImage(Request $request)
    {        
        // Validate the incoming request to ensure it's an image
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|', // Ensuring valid category
            'content' => 'required|string',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validation rule for image
            'image' => 'required',  // Validation rule for image
        ]);
        
        // Check if file is uploaded
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get the uploaded file
            $file = $request->file('image');
            
            // Generate a unique file name with the original extension
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            // Define the path to save the file (You can save it in public or any folder)
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Saves file in storage/app/public/uploads
            
            // Create a new story record in the database
            $story = Story::create([
                'title' => $request->input('title'),
                'image' => $filePath, // Path to the uploaded image
                'category' => $request->input('category'),
                'content' => $request->input('content'),
            ]);
            // return response()->json(['message' => $request]);

            // Return success response with the file path (URL to access the image)
            return response()->json([
                'message' => 'File uploaded and story created successfully',
                'story' => $story, // Return the story object
                'file_path' => asset('storage/' . $filePath),  // This generates a URL that can be accessed
            ], 200);
        }

        return response()->json(['message' => 'File upload failed'], 400);
    }

    public function index(Request $request)
    {
        // Get category from the request, default to 'Familia' if not provided
        $category = $request->get('category', 'Familia');
        
        // Fetch stories by category
        $stories = Story::where('category', $category)->get();
        // dd($stories);
        
        // Pass the data to the view
        return view('stories.index', compact('stories', 'category'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('stories.show', compact('story'));
    }

}

// php artisan storage:link
