<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $note = Note::create($request->all());

        // قم باتخاذ أي إجراءات إضافية مثل إرسال إشعارات أو تحديث النظام

        return response()->json($note, 201);
    }

    public function show(Note $note)
    {
        return response()->json($note, 200);
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());

        // قم باتخاذ أي إجراءات إضافية مثل إرسال إشعارات أو تحديث النظام

        return response()->json($note, 200);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        // قم باتخاذ أي إجراءات إضافية مثل إرسال إشعارات أو تحديث النظام

        return response()->json(null, 204);
    }
}