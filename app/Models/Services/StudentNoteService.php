<?php

namespace App\Models\Services;

use App\Models\StudentNote;
use Illuminate\Support\Facades\Auth;

class StudentNoteService extends ModelService
{
    /**
     * @var StudentNote
     */
    private $studentnote;

    public function __construct(StudentNote $studentnote)
    {
        $this->studentnote = $studentnote;
        $this->model = $studentnote;
    }

    public static function create(
        Int $student_id,
        string $note = null,
        string $note_date = null,
    )
    {
        $studentnote = new StudentNote;
        $studentnote->student_id = $student_id;
        $studentnote->note = $note;
        $studentnote->note_date = $note_date;
        $studentnote->save();

        return $studentnote;
    }

    public function update(
        string $note = null,
        string $note_date = null,
    )
    {
        $this->studentnote->note = $note;
        $this->studentnote->note_date = $note_date;
        $this->studentnote->save();

        return $this->studentnote->fresh();
    }

}