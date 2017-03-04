@extends('layouts.app')

@section('title','Students')

@section('content')
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Team</strong></td>
                <td><strong>School</strong></td>
                <td><strong>Teacher</strong></td>
                <td><strong>Teacher Phone</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Grade</strong></td>
                <td><strong>Phone</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Facebook</strong></td>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$student->team->name}}</td>
                    <td>{{$student->team->school}}</td>
                    <td>{{$student->team->teacher_name}}</td>
                    <td>{{$student->team->teacher_phone_number}}</td>
                    <td>{{$student->name_prefix.' '.$student->first_name.' '.$student->last_name}}</td>
                    <td>{{$student->grade_level}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->facebook}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection