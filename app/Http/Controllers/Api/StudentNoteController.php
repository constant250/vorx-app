<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentNoteResource;
use App\Http\Requests\Student\CreateStudentNoteRequest;
use App\Http\Requests\Student\UpdateStudentNoteRequest;
use App\Models\Student;
use App\Models\StudentNote;
use App\Models\Services\StudentNoteService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class StudentNoteController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('students/{student}/notes', [StudentNoteController::class, 'create']);
        Route::put('students/{student}/notes/{note}', [StudentNoteController::class, 'update']);
        Route::delete('students/{student}/notes/{note}', [StudentNoteController::class, 'delete']);
        Route::get('students/{student}/notes/{note}', [StudentNoteController::class, 'getSingle']);
        Route::get('/students/{student}/notes', [StudentNoteController::class, 'getCollection']);
    }

    public function create(Student $student, CreateStudentNoteRequest $request){

        $validated = $request->validated();
        $note = StudentNoteService::create(
            $student->id,
            $validated['note'] ?? null,
            $validated['note_date'] ?? null,
        );

        return ResponseService::successCreate('Note was created.', new StudentNoteResource($note));
    }

    public function update(Student $student, StudentNote $note, UpdateStudentNoteRequest $request)
    {
        $validated = $request->validated();
        $note = $note->Service()->update(
            $validated['note'] ?? null,
            $validated['note_date'] ?? null, 
        );

        return ResponseService::successCreate('Note was updated.', new StudentNoteResource($note));
    }

    public function getSingle(Student $student, StudentNote $note)
    {
        return new StudentNoteResource($note);
    }

    public function getCollection(Request $request)
    {
        $notes = StudentNote::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return StudentNoteResource::collection($notes);
    }

    public function delete(Student $student, StudentNote $note)
    {
        if(!$note->Service()->delete()) {
            return ResponseService::serverError('Note was not deleted');
        }

        return ResponseService::success('Note was deleted.');

    }
}
