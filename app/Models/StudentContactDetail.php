<?php

namespace App\Models;

use App\Models\Services\StudentContactDetailService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\AccountScope;
use App\Traits\BaseAccountModelTrait;
use App\Traits\ImageableTrait;

class StudentContactDetail extends Model
{
    use HasFactory;
    use BaseAccountModelTrait;
    use ImageableTrait;
    // use SoftDeletes;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function Service(): StudentContactDetailService
    {
        return new StudentContactDetailService($this);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
