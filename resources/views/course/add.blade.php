@extends('layout')
@section('content')
<main class="login-form">
   <div class="cotainer">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">Add Course</div>
               <div class="card-body">
                  <form>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputname" class="form-control" required autofocus>
                           <span id="errorname" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Code</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputcode" class="form-control" required autofocus>
                           <span id="errorcode" class="text-danger"></span>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputdescription" class="form-control" required autofocus>
                           <span id="errordescription" class="text-danger"></span>
                        </div>
                     </div>
                     
                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                           <input type="date"     id="Inputstartdate" class="form-control" required autofocus>
                           <span id="errorstartdate" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">End Date</label>
                        <div class="col-md-6">
                           <input type="date"     id="Inputenddate" class="form-control" required autofocus>
                           <span id="errorendtdate" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="col-md-6 offset-md-4">
                        <button type="button" id="btnAdd" class="btn btn-primary">
                        Add Course
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
   $( document ).ready(function() {
   
   
   $('#btnAdd').click(function(e) {
       clear();
       var token =   window.localStorage.getItem("auth_token");
      
       e.preventDefault();
   
       $.ajax({
              url: "http://127.0.0.1:83/api/course/add",
              data: {  name:$("#Inputname").val(),course_code: $("#Inputcode").val(),
                       description:$("#Inputdescription").val(),
                       start_date:$("#Inputstartdate").val(),
                       end_date:$("#Inputenddate").val()
           
                     },
              type: 'POST' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data);
               window.location.href =  "http://127.0.0.1:83/course/list";
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                   $("#errorstartdate").text(err.errors.start_date);
                  $("#errorendtdate").text(err.errors.end_date);
                  $("#errordescription").text(err.errors.description);
                  $("#errorcode").text(err.errors.course_code);
                  $("#errorname").text(err.errors.name);
               },
       })
      });
   
   
   });
   function clear() {
                   $("#errorstartdate").text('');
                  $("#errorendtdate").text('');
                  $("#errordescription").text('');
                  $("#errorcode").text('');
                  $("#errorname").text('');
   }
   
   
   
</script>
