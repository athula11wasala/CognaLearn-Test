<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\TeacherRepository;

class CommonService
{
    private $courseRepository;
    private $teacherRepository;

    /**
     * CommonService constructor.
     * @param TeacherRepository $teacherRepository
     * @param CourseRepository $courseRepository
     */
    public function __construct(TeacherRepository $teacherRepository,
                                CourseRepository $courseRepository
                                )
    {
        $this->courseRepository = $courseRepository;
        $this->teacherRepository = $teacherRepository;
    }

  
     /**
     * Get all courses
     */
    public function listCourses()
    {
        return $this->courseRepository->getCourses();
    }

     /**
     * Create course
     *
     */
    public function createCourse($data)
    {
        return $this->courseRepository->createCourse($data);
    }

    /**
     * delete course by courseId
     */
    public function deleteCourse($id)
    {
        return $this->courseRepository->deleteCourse($id);
    }

    /**
     * get course by courseId
     *
     */
    public function getCourse($id)
    {
        return $this->courseRepository->getCourses($id);
    }

    /**
     * Update course
     */
    public function updateCourse($courseId, $data)
    {
        return $this->courseRepository->updateCourse(
            $courseId,
            $data
        );
    }


     /**
     * Get all teachers
     */
    public function listTeacher()
    {
        return $this->teacherRepository->getTeacher();
    }

     /**
     * Create teacger
     *
     */
    public function createTeacher($data)
    {
        return $this->teacherRepository->createTecher($data);
    }

    /**
     * delete teacher by Id
     */
    public function deleteTeacher($id)
    {
        return $this->teacherRepository->deleteTeacher($id);
    }

    /**
     * get course by teacherId
     *
     */
    public function getTeacher($id)
    {
        return $this->teacherRepository->getTeacher($id);
    }

    /**
     * Update teacher
     */
    public function updateTeacher($teacherId, $data)
    { 
       
        return $this->teacherRepository->updateTeacher(
            $teacherId,
            $data
        );
    }

     /**
     * select all teachers
     *
     */
    public function selectTeacher()
    {
        return $this->teacherRepository->getTeacher($id);
    }

    
     /**
     * select all course
     *
     */
    public function selectCourse()
    {
        return $this->teacherRepository->getCourse();
    }

     /**
     * Create teacger
     *
     */
    public function assignTeacherCourse($data)
    {
        return $this->teacherRepository->assignTeacherCourse($data);
    }

     /**
     * Get all Courser Teacher Info
     */
    public function listTeacherCourse()
    {
        return $this->teacherRepository->listTeacherCourse();
    }


     /**
     * get courseTeach info by Id
     *
     */
    public function getTeacherCourse($id)
    {
        return $this->teacherRepository->listTeacherCourse($id);
    }



}
