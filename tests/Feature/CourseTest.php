<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Models\teacher;

class CourseTest extends TestCase
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
     * test create new course
     *
     * @return void
     */
    public function test_create_new_course()
    {  
       $this->getAuthToken();

       $postData = Course::factory()->create();
         
      return $this->assertDatabaseHas('courses',[
            'name'=>$postData['name'],
            'course_code'=>$postData['course_code'],
            'description'=>$postData['description'],
            'start_date'=>$postData['start_date'],
            'end_date'=>$postData['end_date']
        ]);
       
    }

    /**
     * test new record with check validation rules
     *
     * @return void
     */
    public function test_create_course_with_chk_validation()
    {  
        $this->getAuthToken();

        $postData =  [
            'name' => 'science',
            'course_code' => '',
            'description' => 'test .....',
            'start_date' => '2024-10-23',
            'end_date' => '2024-10-22'

          ];
    
       $this->post('api/course/add',$postData,$this->header)->dump()->assertStatus(400);
       
    }
}
