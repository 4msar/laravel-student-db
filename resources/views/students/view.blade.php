@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	<div class="card">
                <div class="card-header">Information of <strong style="font-size: 2em;"> @ {{ $student->name }}</strong>
                	<a class="btn btn-info btn-sm float-right nav-link" href="{{ route('students') }}/">Back</a>
                </div>
                <div class="card-body">
					<div class="table-striped table-responsive">
						<table class="table">
							<thead>
								<tr>
									<td><strong>Name</strong></td>
									<td><strong>{{ $student->name }}</strong></td>
								</tr>
							</thead>
						<tbody>
								<tr>
									<td>Roll</td>
									<td>{{ $student->roll }}</td>
								</tr>
								<tr>
									<td>Registration</td>
									<td>{{ $student->registration }}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>{{ $student->email }}</td>
								</tr>
								<tr>
									<td>Phone Number</td>
									<td>{{ $student->phone }}</td>
								</tr>
								<tr>
									<td>Religion</td>
									<td>{{ $student->religion }}</td>
								</tr>
								<tr>
									<td>BirthDate</td>
									<td>{{ $student->birthdate }}</td>
								</tr>
								<tr>
									<td>Gender</td>
									<td>{{ $student->gender }}</td>
								</tr>
								<tr>
									<td>Blood Group</td>
									<td>{{ $student->blood_group }}</td>
								</tr>
								<tr>
									<td>Address</td>
									<td>{{ $student->address }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				@if(Auth::user()->id == $student->user_id)
					<div class="card-footer">
						<a class="btn btn-secondary btn-sm float-right nav-link" href="{{ route('editStudents', $student->id) }}/">Edit</a>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection