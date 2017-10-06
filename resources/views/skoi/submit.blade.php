@extends('layouts.app')

@section('title','Submit task ('.$codeName.')')

@push('scripts')
<script src="/js/judge.js"></script>
<script src="/js/monaco-editor/min/vs/loader.js"></script>
<script src="/js/editor.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit your code</div>
                    <div class="panel-body">
                        <form method="post" id="sourceForm">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="sourceLanguage">Language</label>
                                <select name="language" class="form-control" id="sourceLanguage"
                                        style="border-radius: 2px">
                                    <option value="1">C++11</option>
                                    <!-- Disabled for SKOI
                                    <option value="2" disabled>Python 3 (CPython 3.5)</option>
                                    <option value="3" disabled>Java 8 (HotSpot 8u112)</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sourceCode">Source Code</label>
                                <div id="editor" style="height: 400px;"></div>
                                <input type="hidden" id="sourceCode" name="sourceCode" />
                            </div>
                            <div class="form-group">
                                <label for="inputFile">Load source from disk</label>
                                <input type="file" id="inputFile">
                                <p class="help-block">You can also open your local source file (Your browser must
                                    support HTML5 File API)</p>
                            </div>
                            @if(!empty($redirect))
                                <input type="hidden" name="redirect-target" value="{{$redirect['value']}}">
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button onclick="window.history.back()" class="btn btn-default">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection