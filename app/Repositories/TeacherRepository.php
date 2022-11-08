<?php

namespace App\Repositories;

use App\Models\Teacher;
use App\Models\CourseTeacher;


class TeacherRepository
{
    /**
     * {@inheritDoc}
     */
    public function updateTeacher($id,$data)
    {
        $teacher = Teacher::find($id);
        if ($teacher) {
            $teacher->fname = $data["fname"];
            $teacher->lname = $data["lname"];
            $teacher->email = $data["email"];
            $teacher->phone = $data["phone"];
            return $teacher->save();
        }
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function createTecher($data)
    {
     
        return Teacher::create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getTeacher($teacherId = null)
    {
        $teacher = Teacher::select(
            "id",
            "fname",
            "lname",
            "email",
            "phone"
        );

        if (!empty($teacherId)) { ;
            $teacher->where("id", $teacherId);
        }

        return $teacher->get();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteTeacher($teacherId)
    {
        $teacher = Teacher::find($teacherId);
        if ($teacher) {
            return $teacher->delete();
        }
        return false;
    }

     /**
     * {@inheritDoc}
     */
    public function assignTecherCourse($data)
    {
        return CourseTeacher::create($data);
    }

     /**
     * {@inheritDoc}
     */
    public function deleteAssignTeachCourse($teacherId,$coureId)
    {
        $courseTeacher = CourseTeacher::where(['teacher_id'=>$teacherId,'course_id'=>$coureId])->first();
        if ($courseTeacher) {
            return $courseTeacher->delete();
        }
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function assignTeacherCourse($data)
    {  
        return CourseTeacher::create($data);
    }

      /**
     * {@inheritDoc}
     */
    public function listTeacherCourse($id=0)
    { 
        $teacher = CourseTeacher::select(
            "course_teachers.id",
            "teachers.email",
            "courses.description",
            "courses.course_code",
            "courses.start_date",
            "courses.end_date",
            'courses.id as course_id',
            'teachers.id as teacher_id'
        )
        ->leftjoin('teachers','teachers.id', "course_teachers.teacher_id")
        ->leftjoin('courses','courses.id', "course_teachers.course_id");

        if (!empty($id)) { 
            $teacher->where("course_teachers.id", $id);
        }
        return $teacher->get();
    }


    /**
     * {@inheritDoc}
     */
    public function deleteAssignCourse($id)
    {
        $assignCourse = CourseTeacher::find($id);
        if ($assignCourse) {
            return $assignCourse->delete();
        }
        return false;
    }
   
}
