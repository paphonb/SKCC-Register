@extends('layouts.app')

@section('title','Contest')

@section('content')
    <div class="container">
        @if(!empty($contests))
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
                        <td>{{$contest->description}}</td>
                        <td>{{$contest->start}}</td>
                        <td>{{$contest->end}}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">View</a>
                            @if(collect($contest->users->all())->contains('user_id',Auth::user()->id))
                                <form id="contest-leave" method="post" action="{{route('contest-leave',$contest->id)}}">
                                    {{csrf_field()}}
                                </form>
                                <a href="{{route('contest-leave',$contest->id)}}"
                                   class="btn btn-sm btn-warning"
                                   onclick="event.preventDefault();document.getElementById('contest-leave').submit();">Leave</a>
                            @else
                                <form id="contest-enter" method="post" action="{{route('contest-enter',$contest->id)}}">
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
        @else
            <h5>No contest available right now, please try again later</h5>
        @endif
    </div>
@endsection