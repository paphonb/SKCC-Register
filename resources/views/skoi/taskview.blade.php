@extends('layouts.app')

@section('title','Your submissions for "'.$codeName.'"')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><button onclick="window.history.back()" class="btn btn-default">Back</button> Your submissions for "{{$codeName}}"</div>
                    <div class="panel-body">
                        @if(!empty($submissions))
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td><strong>ID</strong></td>
                                    <td><strong>Result</strong></td>
                                    <td><strong>Score</strong></td>
                                    <td><strong>Time (ms)</strong></td>
                                    <td><strong>Memory (kB)</strong></td>
                                    <td><strong>Submitted Time</strong></td>
                                    <td><strong>Action</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($submissions as $submission)
                                    @php
                                        $result = $submission->result ?: "in progress";
                                        $ip = $result === "in progress" ||
                                        $result === "compilation error" || $result === "judge error" ;
                                    @endphp
                                    <tr
                                            @if($result === "compilation error")
                                            class="warning"
                                            @elseif($result === "in progress")
                                            class="info"
                                            @elseif($submission->score >= 0 && $submission->score < 100)
                                            class="danger"
                                            @elseif($submission->score == 100)
                                            class="success"
                                            @endif >
                                        <td>{{$submission->id}}</td>
                                        <td>{{$result}}</td>
                                        <td>{{$ip ? '-' : $submission->score}}</td>
                                        <td>{{$ip ? '-' : number_format($submission->time)}}</td>
                                        <td>{{$ip ? '-' : number_format($submission->memory)}}</td>
                                        <td width="15%">{{$submission->created_at}}</td>
                                        <td id="action-{{$submission->id}}" width="22%">
                                            <button type="button"
                                                    data-toggle="modal"
                                                    data-target="#sub-modal-{{$submission->id}}"
                                                    class="btn btn-info btn-sm">Source code
                                            </button>
                                            <button type="button"
                                                    data-toggle="modal"
                                                    data-target="#cm-modal-{{$submission->id}}"
                                                    class="btn btn-warning btn-sm"
                                                    @if(empty($submission->compiler_message))disabled @endif
                                                    >Compiler message
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Source Code Modal -->
                                    <div class="modal fade" id="sub-modal-{{$submission->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="sub-modal-{{$submission->id}}-label">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="sub-modal-{{$submission->id}}-label">
                                                        View source code</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <pre>{{$submission->source_code}}</pre>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($submission->compiler_message))
                                    <!-- Compiler message -->
                                    <div class="modal fade" id="cm-modal-{{$submission->id}}" tabindex="-1"
                                         role="dialog" aria-labelledby="cm-modal-{{$submission->id}}-label">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="cm-modal-{{$submission->id}}-label">View
                                                        compiler message</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <pre>{{$submission->compiler_message}}</pre>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">

                            </div>
                            <div class="text-center">
                                {{$submissions->links()}}
                            </div>
                        @else
                            <p>You don't have any submission for this task</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection