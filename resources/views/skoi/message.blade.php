@extends('layouts.app')

@section('title','Messages')

@section('content')
    <div class="container">
        @if(session('alert-type'))
            <div class="row">
                <div class="alert alert-{{session('alert-type')}} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{session('message')}}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit your message</div>
                    <div class="panel-body">
                        <p class="help-block">
                            The clarification requests should be phrased as yes/no questions.<br>
                            The answers will be one of the following:
                        <ol>
                            <li>YES</li>
                            <li>NO</li>
                            <li>ANSWERED IN TASK DESCRIPTION (EXPLICITLY OR IMPLICITLY)</li>
                            <li>INVALID QUESTION</li>
                            <li>NO COMMENT</li>
                        </ol>
                        </p>
                        <form method="post" action="{{route('submit-message')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputMessage">Submit your clarification request</label>
                                <textarea name="message" class="form-control" id="inputMessage" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Your message</div>
                    <div class="panel-body">
                        @if(!empty($messages))
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td width="5%"><strong>#</strong></td>
                                    <td width="25%"><strong>Time</strong></td>
                                    <td><strong>Question</strong></td>
                                    <td width="25%"><strong>Answer</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$message->created_at}}</td>
                                        <td>{{$message->message}}</td>
                                        <td>{{$message->response}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You didn't submit any clarification request.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection