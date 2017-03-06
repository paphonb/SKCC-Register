@extends('layouts.app')

@section('title','Scoreboard of "'.$contest->name.'"')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Scoreboard of "{{$contest->name}}"
            </div>
            <div class="panel-body">
                @if($contest->controller !== 'normal')
                    @include('skoi.crazyscoreboard')
                @else
                    <table class="table table-bordered table-hover">
                        <tghead>
                            <tr>
                                <td width="5%"><strong>Rank</strong></td>
                                <td><strong>Name</strong></td>
                                @foreach($contest->tasks as $task)
                                    <td><strong>{{$task->code_name}}</strong></td>
                                @endforeach
                                <td><strong>Total</strong></td>
                            </tr>
                        </tghead>
                        <tbody>
                        @foreach($contest->users as $user)
                            <tr>
                                @php
                                    $sum = [];
                                @endphp
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                @foreach($contest->tasks as $task)
                                    @php
                                        $sub =
                                        App\Judge\Submission::where('user_id',$user->id)->where('task_id',$task->id)->orderBy('updated_at','desc')->first();
                                        $sum[] = $sub;
                                    @endphp
                                    <td
                                            @if(isset($sub->score))
                                            @if($sub->score >= 0 && $sub->score < 100)
                                            class="danger"
                                            @elseif($sub->score == 100)
                                            class="success"
                                            @endif
                                            @endif
                                    >{{$sub->score or '-'}}</td>
                                @endforeach
                                <td>{{collect($sum)->sum(function($o){return $o->score ?? 0;})}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection