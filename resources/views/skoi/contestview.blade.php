@extends('layouts.app')

@section('title')
    {{$contest->name}} - Contest
@endsection

@section('content')
    @if($contest->controller !== 'normal')
        {{-- INSANITY --}}
    @else
        <div class="container">
            <h1>{{$contest->name}}</h1>
            <div class="row">
                <div class="col-md-125">
                    <div class="panel panel-default">
                        <div class="panel-heading">Contest tasks</div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <td><strong>#</strong></td>
                                    <td><strong>Name</strong></td>
                                    <td><strong>Description</strong></td>
                                    <td><strong>Result</strong></td>
                                    <td><strong>Score</strong></td>
                                    <td><strong>Submissions</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $scoreSum = 0;
                                    $totalScoreSum = 0;
                                @endphp
                                @foreach($tasks as $task)
                                    @php
                                        $lastSub = $task->last;
                                    @endphp
                                    <tr
                                        @php
                                            $result = "-";
                                            $score = '-';
                                            if ($lastSub) {
                                                $result = $lastSub->result ?: "in progress";
                                                if ($lastSub->score >= 0) {
                                                    $score = $lastSub->score;
                                                    $scoreSum += $score;
                                                }
                                            }
                                            $totalScoreSum += 100;
                                        @endphp
                                        @if($lastSub)
                                            @if($lastSub->result === "compilation error")
                                                class="warning"
                                                @elseif($lastSub->result === "")
                                                class="info"
                                                @elseif($lastSub->score >= 0 && $lastSub->score < 100)
                                                class="danger"
                                                @elseif($lastSub->score == 100)
                                                class="success"
                                            @endif
                                        @endif >
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$task['display_name'] or $task['code_name']}} ({{$task['code_name']}})</td>
                                        <td><a href="{{route('task-description',$task['code_name'])}}">Download</a></td>
                                        <td><tt>{{$result}}</tt></td>
                                        <td>{{$score}}</td>
                                        <td><a class="btn btn-info btn-sm"
                                               href="{{route('task-view',$task->code_name)}}">View</a>
                                            <a class="btn btn-primary btn-sm"
                                               href="{{route('task-submit',$task['code_name']).'?redirect=contest-view&value='.$contest->id}}">Submit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Contest details</div>
                        <div class="panel-body">
                            <p>
                                <b>Total score</b>
                                <span class="pull-right">{{$scoreSum}}/{{$totalScoreSum}}</span>
                            </p>
                            @php
                                $percent = $scoreSum / $totalScoreSum * 100;
                            @endphp
                            <div class="progress" style="margin-bottom: 0;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$scoreSum}}" aria-valuemin="0" aria-valuemax="{{$totalScoreSum}}" style="width: {{$percent}}%;">
                                </div>
                            </div>
                            <!--{{$contest->description}}-->
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Status</div>
                        <div class="panel-body">
                            <p>
                                <b>Total score</b>
                                <span class="pull-right">{{$scoreSum}}/{{$totalScoreSum}}</span>
                            </p>
                            @php
                                $percent = $scoreSum / $totalScoreSum * 100;
                            @endphp
                            <div class="progress" style="margin-bottom: 0;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{$scoreSum}}" aria-valuemin="0" aria-valuemax="{{$totalScoreSum}}" style="width: {{$percent}}%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Recent activity</div>
                        <div class="panel-body">
                            <p class="help-block">Disabled</p>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    @endif
@endsection