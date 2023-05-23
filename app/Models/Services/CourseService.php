<?php

namespace App\Models\Services;

use App\Models\Course;
use App\Models\Enums\CourseStatusEnum;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageModelServiceTrait;

class CourseService extends ModelService
{

    use ImageModelServiceTrait;

    /**
     * @var Course
     */
    private $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
        $this->model = $course;
    }

    public static function create(
        string $name,
        string $code,
        int $target_enrolee,
        string $tp_code = null,
        CourseStatusEnum $status
    )
    {
        $course = new Course;
        $course->title = "{$code} - {$name}";
        $course->name = $name;
        $course->code = $code;
        $course->target_enrolee = $target_enrolee;
        $course->tp_code = $tp_code;
        $course->status = $status;
        $course->user_id = Auth::user()->id;
        $course->account_id = Auth::user()->account_id;
        $course->save();

        return $course;
    }

    public function update(
        string $name,
        string $code,
        int $target_enrolee,
        string $tp_code = null,
        CourseStatusEnum $status
    )
    {
        $this->course->title = "{$code} - {$name}";
        $this->course->name = $name;
        $this->course->code = $code;
        $this->course->target_enrolee = $target_enrolee;
        $this->course->tp_code = $tp_code;
        $this->course->status = $status;
        $this->course->save();

        return $this->course->fresh();
    }

    public function assignUnits(array $units)
    {
        $this->course->units()->sync($units);
        return $this->course->fresh();
    }

    public function uploadImages(object $images)
    {
        foreach ($images as $image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time();
            $file = $this->course->FileServiceFactory()->uploadFile($image, $filename);

            $this->course->Service()->attachImage($image, $file['name']);
        }

        return $this->course->fresh()->images;
    }
}
