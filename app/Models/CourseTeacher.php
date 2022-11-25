<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Teacher;

class CourseTeacher extends Model
{
    use HasFactory;

    protected $fillable = ['course_id','teacher_id'];

   /***
    * 
    */
    public function chkAlreadyAssignCourse($courseId,$teacherId){

        
       $data = CourseTeacher::where('course_id',$courseId)
                             ->where('teacher_id',$teacherId)
                             ->first();

    
        if(!empty($data)){ 
            return false;
        }
        return true;                     
    }

    public function assignTeacherCourse($data)
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
             $courseTeacher->delete();
             return true;
        }
        return false;
    }
                            
}
