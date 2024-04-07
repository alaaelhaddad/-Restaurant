<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function show($note_id)
    {
        $note = Note::find($note_id);
        if ($note) {
            return response()->json($note);
        } else {
            return response()->json(['message' => 'Note not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $note = new Note;
        $note->note_no = $request->input('note_no');
        $note->note_date = $request->input('note_date');
        $note->order_no = $request->input('order_no');
        $note->note_time = $request->input('note_time');
        $note->note_description = $request->input('note_description');
        $note->save();

        return response()->json($note, 201);
    }

    public function update(Request $request, $note_id)
    {
        $note = Note::find($note_id);
        if ($note) {
            $note->note_no = $request->input('note_no');
            $note->note_date = $request->input('note_date');
            $note->order_no = $request->input('order_no');
            $note->note_time = $request->input('note_time');
            $note->note_description = $request->input('note_description');
            $note->save();

            return response()->json($note);
        } else {
            return response()->json(['message' => 'Note not found'], 404);
        }
    }

    public function destroy($note_id)
    {
        $note = Note::find($note_id);
        if ($note) {
            $note->delete();
            return response()->json(['message' => 'Note deleted']);
        } else {
            return response()->json(['message' => 'Note not found'], 404);
        }
    }
}