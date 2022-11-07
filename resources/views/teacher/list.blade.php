@extends('layout')
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>

@section('content')
<main class="login-form">
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Teacher</b></h2>
					</div>
					<div class="col-sm-6">
						<a id="addCourse" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Teacher</span></a>
								
					</div>
        
				</div>
			</div>
		<div id="customertbl">

      </div>
			
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Update Teacher</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" id="Inputfname"  required>
						<input type="hidden" id="InputHndId">
                  <span id="errorfname" class="text-danger"></span>
					</div>

					<div class="form-group">
						<label>Last  Name</label>
						<input type="text" class="form-control" id="Inputlname"  required>
                  <span id="errorlname" class="text-danger"></span>
					</div>

					<div class="form-group">
						<label>email</label>
						<input type="email" class="form-control" id="InputEmail" required >
                    <span id="erroremail" class="text-danger"></span>
					</div>


               <div class="form-group">
						<label>Course Code</label>
						<input type="text" class="form-control" id="Inputphone" required>
                  <span id="errorphone" class="text-danger"></span>
					</div>
										
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="button" id="btnUpdate" class="btn btn-success" value="update">
				</div>
			</form>
		</div>
	</div>
</div>
</main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
      var token =   window.localStorage.getItem("auth_token");
  $( document ).ready(function() {
   populateList();
   
   $(document).on("click","#addCourse",function() {
	$(location).attr('href', "http://127.0.0.1:83/teacher")

   });
   $(document).on("click","#hypEdit",function() {
      

      clear();
      $.ajax({
              url: "http://127.0.0.1:83/api/teacher/show/" + $(this).data("id"),
              type: 'GET' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data);
              console.log(data.data[0].name)
               $("#InputHndId").val(data.data[0].id);
               $("#Inputfname").val(data.data[0].fname);
               $("#Inputlname").val(data.data[0].lname);
               $("#InputEmail").val(data.data[0].email);
               $("#Inputphone").val(data.data[0].phone);
	           },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                 
               },
       })
      });






$(document).on("click","#hypdelete",function() {


   clear();
      $.ajax({
              url: "http://127.0.0.1:83/api/teacher/delete/" + $(this).data("id"),
              type: 'DELETE' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               populateList();
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                 
               },
});
});
 


   
   $('#btnUpdate').click(function(e) {
    
      
       e.preventDefault();
   
       $.ajax({
              url: "http://127.0.0.1:83/api/teacher/update/" + $("#InputHndId").val(),
              data: {  fname:$("#Inputfname").val(),lname: $("#Inputlname").val(),
				       email:$("#InputEmail").val(),phone:$("#Inputphone").val()
           
                     },
              type: 'PUT' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               clear();
               populateList();
               location.reload();
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
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
				$("#Inputphone").val('');
				
   }
   

   function populateList(){
      $("#customertbl").html('');
      $.ajax({
              url: "http://127.0.0.1:83/api/teacher",
              type: 'GET' ,
              headers: { Authorization: 'Bearer '+token},
              success: function(data) {
               console.log(data.data);

               html =    "<table class='table table-striped table-hover'><thead><tr>	<th>First Name</th><th>Last Name</th> <th>Email</th><th>Phone</th><th>Actions</th> </tr></thead><tbody>";
               if((data.data)){
                  teacherList =  data.data;
                  for (let i = 0; i < teacherList.length; i++) { 
                     console.log(teacherList[i].fname);
                     html = html+ "<tr>"
                     html = html+ "<td>" + teacherList[i].fname + "</td>" 
                     html = html+ "<td>" + teacherList[i].lname + "</td>" 
                     html = html+ "<td>" + teacherList[i].email + "</td>" 
                     html = html+ "<td>" + teacherList[i].phone + "</td>" 
                     html = html+ "<td><a href='#addEmployeeModal' id='hypEdit' data-id='" + teacherList[i].id + "' class='edit'  data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>"  
                     html = html+ "<a href='#deleteEmployeeModal' id='hypdelete' data-id='" + teacherList[i].id + "' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a> </td>" 
                     html = html+ "</tr>"
                  }
               }
               html = html+ "</tbody><table>"
              $("#customertbl").html(html);
               },
               error: function(request, status, error) {
                   err = JSON.parse(request.responseText);
                   console.log(err);
               },
       })

   }



   
   
   
</script>
