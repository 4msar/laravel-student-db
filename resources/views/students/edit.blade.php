@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Student
                    <strong style="font-size: 2em;"> @ {{ $student->name }}</strong>
                    <a class="btn btn-secondary btn-sm float-right nav-link" href="{{ route('viewStudents', $student->id) }}/">View</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateStudent', $student->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name" name="full_name" value="{{ $student->name }}">
                        </div>
                        <div class="form-group">
                            <label for="roll">Student Roll No</label>
                            <input type="number" class="form-control" id="roll" placeholder="Roll Number" name="roll_num" value="{{ $student->roll }}">
                        </div>
                        <div class="form-group">
                            <label for="reg">Student Registration No</label>
                            <input type="number" class="form-control" id="reg" placeholder="Registration Number" name="reg_num" value="{{ $student->registration }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $student->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile No</label>
                            <input type="text" class="form-control" id="phone" placeholder="Mobile Number" name="mobile" value="{{ $student->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <select name="religion" id="religion" class="form-control">
                                <option value="Islam" {{ old('religion', $student->religion)=='Islam' ? "selected ='selected'" : '' }}>Islam</option>
                                <option value="Hindu" {{ old('religion', $student->religion)=='Hindu' ? "selected ='selected'" : '' }}>Hindu</option>
                                <option value="Christ" {{ old('religion', $student->religion)=='Christ' ? "selected ='selected'" : '' }}>Christ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birth">BirthDate</label>
                            <input type="date" class="form-control" id="birth" placeholder="BirthDate" name="birth" value="{{ $student->birthdate }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male" {{ old('gender', $student->gender)=='Male' ? "selected ='selected'" : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $student->gender)=='Female' ? "selected ='selected'" : '' }}>Female</option>
                                <option value="Other" {{ old('gender', $student->gender)=='Other' ? "selected ='selected'" : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="blood">Blood Group</label>
                            <select name="blood" class="form-control selectpicker" id="blood">
                                <option value="A+"{{ old('blood', $student->blood_group)=='A+' ? "selected ='selected'" : '' }} >A(+)</option>
                                <option value="A-"{{ old('blood', $student->blood_group)=='A-' ? "selected ='selected'" : '' }} >A(-)</option>
                                <option value="AB+"{{ old('blood', $student->blood_group)=='AB+' ? "selected ='selected'" : '' }} >AB(+)</option>
                                <option value="AB-"{{ old('blood', $student->blood_group)=='AB-' ? "selected ='selected'" : '' }} >AB(-)</option>
                                <option value="B+"{{ old('blood', $student->blood_group)=='B+' ? "selected ='selected'" : '' }} >B(+)</option>
                                <option value="B-"{{ old('blood', $student->blood_group)=='B-' ? "selected ='selected'" : '' }} >B(-)</option>
                                <option value="O+"{{ old('blood', $student->blood_group)=='O+' ? "selected ='selected'" : '' }} >O(+)</option>
                                <option value="O-"{{ old('blood', $student->blood_group)=='O-' ? "selected ='selected'" : '' }} >O(-)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Address" name="address" value="{{ $student->address }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
