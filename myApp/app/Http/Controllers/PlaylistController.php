<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display playlists.
     */
    public function index()
    {
        $search = request('search');

        $playlists = Playlist::where('user_id', auth()->id())
            ->when($search, function ($query) use ($search) {
                $query->where('playlist_name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store playlist.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'playlist_name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $validated['user_id'] = auth()->id();

        Playlist::create($validated);

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist added successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        return view('playlists.edit', compact('playlist'));
    }

    /**
     * Update playlist.
     */
    public function update(Request $request, Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'playlist_name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $playlist->update($validated);

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist updated successfully.');
    }

    /**
     * Delete playlist.
     */
    public function destroy(Playlist $playlist)
    {
        if ($playlist->user_id !== auth()->id()) {
            abort(403);
        }

        $playlist->delete();

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist deleted successfully.');
    }
}
