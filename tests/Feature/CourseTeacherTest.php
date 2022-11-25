<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Models\teacher;
use App\Models\CourseTeacher;

class CourseTeacherTest extends TestCase
{
    private $header;
    public function getAuthToken(){

      $createUserToken = $this->call('POST', '/api/login', [
                  'email' => 'admin@gmail.com',
                  'password'=>'123456'
              ]);
     
      $this->header = [
          'Accept' => 'application/json',
          'Authorization' => 'Bearer ' .$createUserToken['access_token'],
      ];

    }

      /**
     * test assign course to teacher
     *
     * @return void
     */
    public function test_assign_course_teacher()
    {  
       $this->getAuthToken();

       $courseData = Course::factory()->create();
       $teacherData = Teacher::factory()->create();

       $this->post('api/course/teacher/add',[
        'course_id'=> $courseData['id'],
        'teacher_id'=> $teacherData['id'] 
        ],  $this->header)
        ->assertStatus(200);
       
    }

    
      /**
     * test validate assign course to teacher
     *
     * @return void
     */
    public function test_assign_course_teacher_validate()
    {  
       $this->getAuthToken();

       $courseData = Course::factory()->create();
       $teacherData = Teacher::factory()->create();

       $this->post('api/course/teacher/add',[
        'course_id'=>'',
        'teacher_id'=> $teacherData['id'] 
        ],  $this->header)
        ->dump()
        ->assertStatus(400);
       
    }

    /**
     * check  alrady  assigned course to teacher
     *
     * @return void
     */
    public function test__alrady_assign_course_teacher()
    {  
       $this->getAuthToken();

       $courseData = Course::factory()->create();
       $teacherData = Teacher::factory()->create();

     
      
       $data = (new CourseTeacher())->chkAlreadyAssignCourse($courseData->id, $teacherData->id);
       
       $this->assertEquals(true, $data  );
       
    }

    /**
     * delete assign course
     *
     * @return void
     */
    public function test_delete_assign_course_teacher()
    {  
       $this->getAuthToken();

       $courseData = Course::factory()->create();
       $teacherData = Teacher::factory()->create();
       (new CourseTeacher())->assignTeacherCourse(['course_id'=>$courseData->id,'teacher_id'=>$teacherData->id]);

       $data = (new CourseTeacher())->deleteAssignTeachCourse($teacherData->id,$courseData->id);

       $this->assertEquals(true, $data  );
       
    }

}
