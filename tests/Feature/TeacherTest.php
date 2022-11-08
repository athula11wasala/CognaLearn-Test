<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Models\teacher;

class TeacherTest extends TestCase
{
    //use RefreshDatabase,WithFaker;
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
     * test create new teacher
     *
     * @return void
     */
    public function test_create_new_teacher()
    {  
       $this->getAuthToken();

       $postData = Teacher::factory()->create();
         
      return $this->assertDatabaseHas('teachers',[
            'fname'=>$postData['fname'],
            'lname'=>$postData['lname'],
            'email'=>$postData['email'],
            'phone'=>$postData['phone']
        ]);
       
    }

    /**
     * test new record with unique email validation rules
     *
     * @return void
     */
    public function test_create_teachers_with_unique_email()
    {  
        $this->getAuthToken();

    $postData = Teacher::factory()->create();
    
       $this->post('api/teacher/add',[
        'fname'=>$postData['fname'],
        'lname'=>$postData['lname'],
        'email'=>$postData['email'],
        'phone'=>$postData['phone']
        ],  $this->header)
       ->dump()
        ->assertStatus(400);
       
    }

    /**
     * test new record with check validation rules
     *
     * @return void
     */
    public function test_create_teachers_with_chk_validation()
    {  
        $this->getAuthToken();

        $postData =  [
            'fname' => 'test',
            'lname' => 'test',
            'email' => 'test2gmail.com',
            'phone' => '+1-559-939-6702'

          ];
    
       $this->post('api/teacher/add',[
        'lname'=>$postData['lname'],
        'email'=>$postData['email'],
        'phone'=>$postData['phone']
        ],  $this->header)
       ->dump()
        ->assertStatus(400);
       
    }
}
