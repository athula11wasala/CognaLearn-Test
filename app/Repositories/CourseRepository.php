<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    /**
     * {@inheritDoc}
     */
    public function updateCourse($courseId, $data)
    {
        $course = Course::find($courseId);
        if ($course) {
            $course->name = $data["name"];
            $course->course_code = $data["course_code"];
            $course->description = $data["description"] ?? '';
            $course->start_date = $data["start_date"] ?? $course->start_date ;
            $course->end_date = $data["end_date"]?? $course->end_date ;
            return $course->save();
        }
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function createCourse($data)
    {
        return Course::create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getCourses($courseId = null)
    {
        $course = Course::select(
            "id",
            "name",
            "course_code",
            "description",
            "start_date",
            "end_date"
        );

        if (!empty($courseId)) {
            $course->where("id", $courseId);
        }

        return $course->get();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteCourse($courseId)
    {
        $course = Course::find($courseId);
        if ($course) {
            return $course->delete();
        }
        return false;
    }
}
