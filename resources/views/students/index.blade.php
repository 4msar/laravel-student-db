@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card">
                <div class="card-header">All Students</div>
                <div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Roll</th>
									<th>Email</th>
									<th>Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if(count($students) > 0)
									@foreach($students as $student)
									<tr>
										<td>{{ ++$loop->index }}</td>
										<td>{{ $student->name }}</td>
										<td>{{ $student->roll }}</td>
										<td>{{ $student->email }}</td>
										<td>{{ $student->address }}</td>
										<td>
											<div class="btn-group btn-group-sm">
												<a class="btn btn-info" href="{{ route('viewStudents', $student->id ) }}/">View</a> 
												<a class="btn btn-warning" href="{{ route('editStudents', $student->id ) }}/">Edit</a> 
												<a class="btn btn-danger" onclick="return confirm('Do you really want to Delete? ')" href="{{ route('deleteStudent', $student->id) }}/">Delete</a>
											</div>
										</td>
									</tr>
									@endforeach
								@else
									<p>No Data Found</p>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection