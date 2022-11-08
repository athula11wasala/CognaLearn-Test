@extends('layout')
@section('content')
<main class="login-form">
   <div class="cotainer">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Assign Course </div>
               <div class="card-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Teacher</label>
                        <div class="col-md-6">
                        <select id="Inputteacher" class="form-control" required autofocus>
                        <option value="">please select</option>
                        </select>
                           <span id="errorteacher" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Course</label>
                        <div class="col-md-6">
                        <select id="Inputcourse" class="form-control" required autofocus>
                        <option value="">please select</option>
                        </select>
                           <span id="errorcourse" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="col-md-6 offset-md-4">
                        <button type="button" id="btnAdd" class="btn btn-primary">
                        Add 
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
 
 var token =   window.localStorage.getItem("auth_token");
 var selecteacher = $("#Inputteacher");
 $( document ).ready(function() {
 
   populateTeacherList();
   populateCourseList();

   $('#btnAdd').click(function(e) {
   
       e.preventDefault();
       $("#errorcourse").text('');
      $("#errorteacher").text('');
   
       $.ajax({
              url: "http://127.0.0.1:83/api/course/teacher/add",
              data: {  course_id:$("#Inputcourse").val(),teacher_id: $("#Inputteacher").val()
           
                     },
              type: 'POST' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               clear(); 
               console.log(data);
               window.location.href =  "http://127.0.0.1:83/course/teacher/list";
               },
               error: function(request, status, error) { 
                     err = JSON.parse(request.responseText);
                  ;
                     $("#errorcourse").text(err.errors.course_id);
                     $("#errorteacher").text(err.errors.teacher_id);
               
               },
       })

      });
   
   
   });
   function clear() {
               $("#errorcourse").text('');
               $("#errorteacher").text('');
            
               $("#InputHndId").val('');
               $("#Inputteacher").val('');
               $("#Inputteacher").val('');
              
   }

   function populateTeacherList(){
      $("#customertbl").html('');
      $.ajax({
              url: "http://127.0.0.1:83/api/teacher",
              type: 'GET' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data.data);

               if((data.data)){
                 teacherList =  data.data;
                  for (let i = 0; i < teacherList.length; i++) { 
                    
                     $("#Inputteacher").append($("<option />").val(teacherList[i].id).text(teacherList[i].email));
                  }
               }
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                   console.log(err);
               },
       })

   }

   function populateCourseList(){
    
      $.ajax({
              url: "http://127.0.0.1:83/api/course",
              type: 'GET' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data.data);

               if((data.data)){
                  courseList =  data.data;
                  for (let i = 0; i < courseList.length; i++) { 
                    
                     $("#Inputcourse").append($("<option />").val(courseList[i].id).text(courseList[i].name + courseList[i].course_code));
                  }
               }
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                   console.log(err);
               },
       })

   }

   
   
   
</script>
