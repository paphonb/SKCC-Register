@extends('layouts.app')

@section('title','Status')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Submissions status</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="active">
                                <td><strong>ID</strong></td>
                                <td><strong>User</strong></td>
                                <td><strong>Task</strong></td>
                                <td><strong>Score</strong></td>
                                <td><strong>Result</strong></td>
                                <td><strong>Time (ms)</strong></td>
                                <td><strong>Memory (kB)</strong></td>
                                <td><strong>Submitted Time</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($submissions as $submission)
                                @php
                                    $ip = $submission->result === "" ||
                                    $submission->result === "compilation error" || $submission->result === "judge error" ;
                                @endphp
                                <tr
                                        @if($submission->result === "compilation error")
                                        class="warning"
                                        @elseif($submission->result === "")
                                        class="info"
                                        @elseif($submission->score >= 0 && $submission->score < 100)
                                        class="danger"
                                        @elseif($submission->score == 100)
                                        class="success"
                                        @endif >
                                    <td>{{$submission->id}}</td>
                                    <td>{{$submission->user->username}}</td>
                                    <td>{{$submission->task->code_name}}</td>
                                    <td>{{$ip ? '-' : $submission->score}}</td>
                                    <td><tt>{{$submission->result ?: "in progress"}}</tt></td>
                                    <td>{{$ip ? '-' : number_format($submission->time)}}</td>
                                    <td>{{$ip ? '-' : number_format($submission->memory)}}</td>
                                    <td width="15%">{{$submission->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{$submissions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection