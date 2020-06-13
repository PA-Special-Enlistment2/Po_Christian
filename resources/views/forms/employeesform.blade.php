@extends('layouts.app')

@section('content')

<div class="container">	 
	<div class="row">
		<h1>Employees</h1>
	</div>
	<div class="row">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addemployeemodal">
  			Add Employee
		</button>
	</div>
	<hr>
	<div class="row">
		<table class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">First Name</th>
		      <th scope="col">Middle Name</th>
		      <th scope="col">Last Name</th>
		      <th scope="col">Gender</th>
		      <th scope="col">Civil Status</th>
		      <th scope="col">Position</th>
		      <th scope="col">Email</th>
		      <th scope="col">Contact</th>
		      <th scope="col">Department</th>
		      <th scope="col">Action</th>

		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($datas as $data)
		    <tr>
		      <td>{{ $data->id }}</td>
		      <td>{{ $data->fname }}</td>
		      <td>{{ $data->mname }}</td>
		      <td>{{ $data->lname }}</td>
		      <td>{{ $data->gender }}</td>
		      <td>{{ $data->status }}</td>
		      <td>{{ $data->position }}</td>
		      <td>{{ $data->email }}</td>
		      <td>{{ $data->contact }}</td>
		      <td>{{ $data->name }}</td>
		      <td>
		      	<button class="btn btn-success editbtn">Edit</button>
		      	<button class="btn btn-danger deletebtn">Delete</button>
		      	<button class="btn btn-warning genqr">Generate QrCode</button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</div>
<!--Add Employee Data -->
<div class="modal fade" id="addemployeemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employees Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addemployee">
	      <div class="modal-body">
	      	@csrf
			  <div class="form-group">
			    <label for="fname">First Name</label>
			    <input type="text" class="form-control" name="fname">
			  </div>
			  <div class="form-group">
			    <label for="mname">Middle Name</label>
			    <input type="text" class="form-control" name="mname">
			  </div>
			  <div class="form-group">
			    <label for="lname">Last Name</label>
			    <input type="text" class="form-control" name="lname">
			  </div>
			  <div class="form-group">
			    <label for="gender">Gender</label>
			    <select class="form-control" name="gender">
			      <option value="Male">Male</option>
			      <option value="Female">Female</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="status">Civil Status</label>
			    <input type="text" class="form-control" name="status">
			  </div>
			  <div class="form-group">
			    <label for="position">Position</label>
			    <input type="text" class="form-control" name="position">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" aria-describedby="emailHelp" name="email">	
			  </div>
			  <div class="form-group">
			    <label for="contact">Contact</label>
			    <input type="text" class="form-control" name="contact">
			  </div>
			  <div class="form-group">
			    <label for="dep_id">Department</label>
			    <!-- <input type="number" class="form-control" name="dep_id"> -->
		      	<select class="form-control" name="dep_id">
			  		@foreach($departments as $department)
			  			<option value="{{ $department->id }}">{{$department->name}}</option>
			  		@endforeach
			  	</select>
			  </div>
			</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
   	 </div> 
	</form>
  </div>
</div>

<!-- Edit Employee Data Modal -->
<div class="modal fade" id="editemployeemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Employee Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editemployee">
	      <div class="modal-body">
	      	@csrf
	      	{{ method_field('PUT') }}
	      	<input type="hidden" name="id" id="id">
			  <div class="form-group">
			    <label for="fname">First Name</label>
			    <input type="text" class="form-control" id="fname" name="fname">
			  </div>
			  <div class="form-group">
			    <label for="mname">Middle Name</label>
			    <input type="text" class="form-control" id="mname" name="mname">
			  </div>
			  <div class="form-group">
			    <label for="lname">Last Name</label>
			    <input type="text" class="form-control" id="lname" name="lname">
			  </div>
			  <div class="form-group">
			    <label for="gender">Gender</label>
			    <select class="form-control" id="gender" name="gender">
			      <option value="Male">Male</option>
			      <option value="Female">Female</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="status">Civil Status</label>
			    <input type="text" class="form-control" id="status" name="status">
			  </div>
			  <div class="form-group">
			    <label for="position">Position</label>
			    <input type="text" class="form-control" id="position" name="position">
			  </div>
			  <div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">	
			  </div>
			  <div class="form-group">
			    <label for="contact">Contact</label>
			    <input type="text" class="form-control" id="contact" name="contact">
			  </div>
			  <div class="form-group">
			    <label for="dep_id">Department</label>
			    <!-- <input type="number" class="form-control" id="dep_id" name="dep_id"> -->
			    <select class="form-control" name="dep_id" id="dep_id">
			  		@foreach($departments as $department)
			  			<option value="{{ $department->id }}">{{$department->name}}</option>
			  		@endforeach
			  	</select>
			  </div>
			</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save changes</button>
      	</div>
   	 </div> 
	</form>
  </div>
</div>

<!-- DElete Employee Modal Data -->

<div id="employeedeletemodal" tabindex="-1" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-danger">
      	<h5 class="modal-title">Delete Employee</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="deleteemployee">
      	<div class="modal-body">
      		@csrf
      		{{ method_field('delete') }}

      		<input type="hidden" name="delete_id" id="delete_id">
      		<p>Are You Sure !! you want to Delete this Data ?</p>
      	</div>
      	<div class="modal-footer">
        	<button type="" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
      </form>
    </div>

  </div>
</div>

<!-- Modal to generate qrcode --> 
<div id="employeeqr" tabindex="-1" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-warning">
      	<h5 class="modal-title">Generate QRCode</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="qremployee">
      	<div class="modal-body">
      		@csrf
      		{{ method_field('get') }}
      		<input type="hidden" name="empqr" id="empqr">
      	</div>
      	<div class="modal-footer">
        	<button type="" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Generate</button>
      	</div>
      </form>
    </div>

  </div>
</div>



<script type="text/javascript">
	
	$(document).ready(function(){

		$('#addemployee').on('submit', function(e){
			e.preventDefault();

			$.ajax({

				type: 'POST',
				url: '/employeeadd',
				data: $('#addemployee').serialize(),
				success: function (response) {
					console.log(response)
					$('#addemployeemodal').modal('hide')
					alert('Data Saved');
					location.reload()
				},
				error: function(error) {
					console.log(error)
					alert('Data Not Saved');
				}
			});
		});

		$('.editbtn').on('click', function(){
			$('#editemployeemodal').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#id').val(data[0]);
			$('#fname').val(data[1]);
			$('#mname').val(data[2]);
			$('#lname').val(data[3]);
			$('#gender').val(data[4]);
			$('#status').val(data[5]);
			$('#position').val(data[6]);
			$('#email').val(data[7]);
			$('#contact').val(data[8]);
			$('#dep_id').val(data[9]);

		});

		$('#editemployee').on('submit', function(e){
			e.preventDefault(e);

			var id = $('#id').val();

			$.ajax({
				type: 'PUT',
				url: '/employeeupdate/'+id,
				data: $('#editemployee').serialize(),
				success: function (response) {
					$('#editemployeemodal').modal('hide')
					alert('Data Updated');
					window.location.reload();
				},
				error: function(error){
					console.log(error);
				}
			})
		});

		$('.deletebtn').on('click', function(){
			$('#employeedeletemodal').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#delete_id').val(data[0]);
		});

		$('#deleteemployee').on('submit', function(e){
			e.preventDefault(e);

			var id = $('#delete_id').val();

			$.ajax({
				type: 'DELETE',
				url: '/employeedelete/'+id,
				data: $('#deleteemployee').serialize(),
				success: function (response) {
					$('#employeedeletemodal').modal('hide')
					alert('Data Deleted');
					location.reload();
				},
				error: function(error){
					console.log(error);
				}
			})
		});

		$('.genqr').on('click', function(){
			$('#employeeqr').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map( function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#empqr').val(data[0]);
			
		});

		$('#qremployee').on('submit', function(e){
			e.preventDefault(e);

			var id = $('#empqr').val();

			alert(id);

			$.ajax({
				type: 'GET',
				url: '/employeeqr/'+id,
				data: $('qremployee').serialize(),
				success: function(){
					alert('Hey!');
					window.location = ("employeeqr/"+id);
				}
			});


		});


 	});

</script>

@endsection
