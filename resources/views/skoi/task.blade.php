@extends('layouts.app')

@section('title','Task list')

@push('scripts')
<script src="/js/judge.js"></script>
@endpush

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <td><strong>#</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Description</strong></td>
                <td><strong>Result</strong></td>
                <td><strong>Score</strong></td>
                <td><strong>Action</strong></td>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $idx => $task)
                <tr>
                    <td>{{$idx+1}}</td>
                    <td>{{$task['name'] or $task['code_name']}} ({{$task['code_name']}})</td>
                    <td><a href="{{route('task-description',$task['code_name'])}}">Download</a></td>
                    <td>empty</td>
                    <td>{{$task['score'] or '-'}}</td>
                    <td><a href="{{route('task-submit',$task['code_name'])}}">Submit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection