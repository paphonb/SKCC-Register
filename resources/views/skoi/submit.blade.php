@extends('layouts.app')

@section('title','Submit task ('.$codeName.')')

@push('scripts')
<script src="/js/judge.js"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Submit your code</div>
                    <div class="panel-body">
                        <form method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="sourceLanguage">Language</label>
                                <select name="language" class="form-control" id="sourceLanguage"
                                        style="border-radius: 2px">
                                    <option value="1">C++ (GCC 5.4.0)</option>
                                    <!-- Disabled for SKOI -->
                                    <option value="2" disabled>Python 3 (CPython 3.5)</option>
                                    <option value="3" disabled>Java 8 (HotSpot 8u112)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sourceCode">Source Code</label>
                                <textarea name="sourceCode" style="font-family: Consolas,sans-serif"
                                          class="form-control" id="sourceCode"
                                          rows="10">{{$exampleCode or ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputFile">Load source from disk</label>
                                <input type="file" id="inputFile">
                                <p class="help-block">You can also open your local source file (Your browser must
                                    support HTML5 File API)</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button onclick="window.history.back()" class="btn btn-default">Back</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection