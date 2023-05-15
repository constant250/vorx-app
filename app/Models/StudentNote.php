<?php

namespace App\Models;

use App\Models\Services\StudentNoteService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentNote extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'note_date'  => 'date',
    ];

    public function Service(): StudentNoteService
    {
        return new StudentNoteService($this);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
