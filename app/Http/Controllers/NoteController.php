<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // GET /api/notes
    public function index()
    {   return response()->json(
        Note::latest()->paginate(10)
    );
    }

    public function search(Request $request)
{
    $query = $request->q;

    $notes = Note::where('title', 'like', "%$query%")
                 ->orWhere('content', 'like', "%$query%")
                 ->get();

    return response()->json($notes);
}

    // POST /api/notes
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'is_pinned' => 'boolean'
    ]);

    $note = Note::create($validated);

    return response()->json($note, 201);
    }

    // GET /api/notes/{id}
    public function show($id)
    {
        return response()->json(Note::findOrFail($id));
    }

    // PUT /api/notes/{id}
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
            'is_pinned' => $request->is_pinned ?? false
        ]);

        return response()->json($note);
    }

    // DELETE /api/notes/{id}
    public function destroy($id)
    {
        Note::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Note deleted'
        ]);
    }
}