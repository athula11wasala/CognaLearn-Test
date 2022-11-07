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
                        <label for="name" class="col-md-4 col-form-label text-md-right">Teacher</label>
                        <div class="col-md-6">
                        <select  type="text"     id="Inputfname" class="form-control" required autofocus>
                           <span id="errorfname" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">course</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputlname" class="form-control" required autofocus>
                           <span id="errorlname" class="text-danger"></span>
                        </div>
                     </div>


                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                           <input type="text"     id="InputEmail" class="form-control" required autofocus>
                           <span id="erroremail" class="text-danger"></span>
                        </div>
                     </div>

                     <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                        </div>
                        <label for="name" class="col-md-4 col-form-label text-md-right">Phone</label>
                        <div class="col-md-6">
                           <input type="text"     id="Inputphone" class="form-control" required autofocus>
                           <span id="errorphone" class="text-danger"></span>
                        </div>
                     </div>
                   

                     <div class="col-md-6 offset-md-4">
                        <button type="button" id="btnAdd" class="btn btn-primary">
                        Add teacher
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
     
       var token =   window.localStorage.getItem("auth_token");
      
       e.preventDefault();
   
       $.ajax({
              url: "http://127.0.0.1:83/api/teacher/add",
              data: {  fname:$("#Inputfname").val(),lname: $("#Inputlname").val(),
				            email:$("#InputEmail").val(),phone:$("#Inputphone").val()
           
                     },
              type: 'POST' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               clear(); 
               console.log(data);
               window.location.href =  "http://127.0.0.1:83/teacher/list";
               },
               error: function(request, status, error) { 
                     err = JSON.parse(request.responseText);
                     console.log(err.errors);
                     $("#errorfname").text(err.errors.fname);
                     $("#errorlname").text(err.errors.lname);
                     $("#erroremail").text(err.errors.email);
                     $("#errorphone").text(err.errors.phone);
               },
       })

      });
   
   
   });
   function clear() {
               $("#errorpassword").text('');
               $("#errorfname").text('');
               $("#errorfname").text('');
               $("#errorlname").text('');
               $("#erroremail").text('');
               $("#errorphone").text('');
			 
               $("#InputHndId").val('');
               $("#Inputfname").val('');
               $("#Inputlname").val('');
               $("#InputEmail").val('');
   }
   
   
   
</script>
