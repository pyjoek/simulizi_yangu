<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
   public function uploadImage(Request $request)
    {
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

            $story = Story::create([
                'title' => $request->input('title'),
                'category' => $request->input('category'),
                'content' => $request->input('content'),
                'image' => $path,  
                'user_id' => $request->user_id
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

    public function showStories() 
    {
        $stories = Story::all();
        return view('profile.show', compact('stories'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        return view('stories.show', compact('story'));
    }

}

// php artisan storage:link
