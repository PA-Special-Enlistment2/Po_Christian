@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	<h1>Departments</h1>
	</div>
	<div class="row">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddepartmentmodal">
			Add Department
	</button>
	</div>
	<hr>
	<div class="row">
		<table class="table table-dark">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Department</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($departments as $department)
		    <tr>
		      <td>{{ $department->id }}</td>
		      <td>{{ $department->name }}</td>
		      <td>
		      	<button class="btn btn-success editbtndep">Edit</button>
		      	<button class="btn btn-danger deletebtndep">Delete</button>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="adddepartmentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="adddepartment">
	      <div class="modal-body">
	      	@csrf
			  <div class="form-group">
			    <label for="dep_name">Department Name</label>
			    <input type="text" class="form-control" name="dep_name">
			  </div>
			</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save</button>
      	</div>
   	 </div> 
	</form>
  </div>
</div>

<!-- Edit Department -->
<div class="modal fade" id="editpartmentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Department Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editdepartment">
	      <div class="modal-body">
	      	@csrf
	      	{{ method_field('PUT') }}
	      	<input type="hidden" name="id" id="dep_id">
			  <div class="form-group">
			    <label for="dep_name">Department Name</label>
			    <input type="text" class="form-control" name="dep_name" id="dep_name">
			  </div>
			</div>
		<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Save</button>
      	</div>
   	 </div> 
	</form>
  </div>
</div>

<!-- Delete Department -->
<div id="depdeletemodal" tabindex="-1" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-danger">
      	<h5 class="modal-title">Delete Department</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="deletedep">
      	<div class="modal-body">
      		@csrf
      		{{ method_field('delete') }}

      		<input type="hidden" name="depdelete_id" id="depdelete_id">
      		<p>Are You Sure !! you want to Delete this Data ?</p>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary">Delete</button>
      	</div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#adddepartment').on('submit', function(e){
			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: '/department',
				data: $('#adddepartment').serialize(),
				success: function() {
					$('#adddepartmentmodal').modal('hide');
					alert('Data Save');
					location.reload();
				},
				error: function(error){
					console.log(error);
					alert('Data not save');
				}
			});
		});

		$('.editbtndep').on('click', function(){
			$('#editpartmentmodal').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map( function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#dep_id').val(data[0]);
			$('#dep_name').val(data[1]);

		});

		$('#editdepartment').on('submit', function(e){
			e.preventDefault();

			var id = $('#dep_id').val();
			$.ajax({
				type: 'PUT',
				url: '/department/'+id,
				data: $('#editdepartment').serialize(),
				success: function(){
					$('#editpartmentmodal').modal('hide');
					alert('Data Updated');
					window.location.reload();
				},
				error: function(error){
					console.log(error);
				}
			});
		});

		$('.deletebtndep').on('click', function() {
			$('#depdeletemodal').modal('show');

			$tr = $(this).closest('tr');

			var data = $tr.children('td').map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#depdelete_id').val(data[0]);
		});

		$('#deletedep').on('submit', function(e){
			e.preventDefault();

			var id = $('#depdelete_id').val();

			$.ajax({
				type: 'DELETE',
				url: '/department/'+id,
				data: $('#deletedep').serialize(),
				success: function(){
					$('#depdeletemodal').modal('hide');
					alert('Data Deleted');
					location.reload();
				},
				error: function(error){
					console.log(error);
				}
			})
		})
	});
</script>

@endsection