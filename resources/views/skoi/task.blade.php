@extends('layouts.app')

@section('title','Task list')

@push('scripts')
<script src="/js/judge.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Task list</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td><strong>#</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Latest Result</strong></td>
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
                                    <td>{{$task['last']->result or '-'}}</td>
                                    @if(isset($task['last']))
                                        @if($task['last']->score < 0)
                                            <td>-</td>
                                        @else
                                            <td>{{$task['last']->score or '-'}}</td>
                                        @endif
                                    @else
                                        <td>-</td>
                                    @endif
                                    <td><a class="btn btn-info btn-sm" href="{{route('task-view',$task['code_name'])}}">View</a>
                                        <a class="btn btn-primary btn-sm"
                                           href="{{route('task-submit',$task['code_name'])}}">Submit</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection