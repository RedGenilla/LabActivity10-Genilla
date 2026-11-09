<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display published bulletin posts.
     */
    public function index(Request $request)
    {
        // Start a query that only includes published posts.
        $query = Post::query()
            ->where('is_published', true);

        // Search post titles when a search term is provided.
        if ($request->filled('q')) {
            $query->where(
                'title',
                'LIKE',
                '%' . $request->input('q') . '%'
            );
        }

        // Filter by category when one is selected.
        if ($request->filled('category')) {
            $query->where(
                'category',
                $request->input('category')
            );
        }

        // Display pinned posts first, followed by newest posts.
        // Genilla has 7 letters, so show 7 posts per page.
        $posts = $query
            ->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate(7)
            ->withQueryString();

        // Retrieve available categories for the filter dropdown.
        $categories = Post::query()
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        // Pass the posts and categories to the Blade view.
        return view('posts.index', compact('posts', 'categories'));
    }
    
    /**
     * Display a single published bulletin post.
     */
    public function show($id)
    {
        // Find the post by its ID.
        // If the post does not exist, return a 404 error.
        $post = Post::findOrFail($id);

        // Draft posts should not be visible to residents.
        if (!$post->is_published) {
            abort(404);
        }

        // Increase the view counter by one.
        $post->views = $post->views + 1;

        // Save the updated view count to the database.
        $post->save();

        // Display the selected post using the show Blade view.
        return view('posts.show', compact('post'));
    }
}

