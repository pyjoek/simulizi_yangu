<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
   public function uploadImage(Request $request)
    {        
       // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string', // Ensure category is provided
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Check if file is uploaded and valid
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Get uploaded file
            $file = $request->file('image');

            // Generate unique file name
            $fileName = time() . '.' . $file->getClientOriginalExtension();

            // Store file in public/uploads (storage/app/public/uploads)
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            // Create a new story record
            $story = Story::create([
                'title' => $request->input('title'),
                'image' => $filePath,
                'category' => $request->input('category'),
                'content' => $request->input('content'),
            ]);

            // Redirect back or to another page with success message
            return redirect('/')
                ->with('success', 'Story created successfully!');
        }

        // If upload fails
        return redirect()
            ->back()
            ->with('error', 'File upload failed. Please try again.')
            ->withInput();
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
