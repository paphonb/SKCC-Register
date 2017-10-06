@extends('layouts.app')

@section('title','Contest')

@section('content')
    <div class="container">
        @if(!empty($contests))
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Contests</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td><strong>Description</strong></td>
                                    <td width="15%"><strong>Start</strong></td>
                                    <td width="15%"><strong>End</strong></td>
                                    <td><strong>Action</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contests as $contest)
                                    <tr>
                                        <td>{{$contest->name}}</td>
                                        <td>{{str_limit($contest->description,20)}}</td>
                                        <td>{{$contest->start}}</td>
                                        <td>{{$contest->end}}</td>
                                        <td>
                                            <a href="{{route('contest-view',$contest->id)}}"
                                               class="btn btn-sm btn-info">Details</a>
                                            @if($contest->users()->where('user_id',Auth::user()->id)->count() > 0)
                                                <a class="btn btn-sm btn-success">Entered</a>
                                                <a href="{{route('contest-scoreboard',$contest->id)}}"
                                                   class="btn btn-sm btn-primary">Scoreboard</a>
                                            @else
                                                <form style="display: none" id="contest-enter" method="post"
                                                      action="{{route('contest-enter',$contest->id)}}">
                                                    {{csrf_field()}}
                                                </form>
                                                <a href="{{route('contest-enter',$contest->id)}}"
                                                   class="btn btn-sm btn-primary"
                                                   onclick="event.preventDefault();document.getElementById('contest-enter').submit();">Enter</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h5>No contest available right now, please try again later</h5>
        @endif
    </div>
@endsection