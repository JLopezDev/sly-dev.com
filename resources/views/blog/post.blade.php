@extends('layouts.default.default')

@section('title') {{$post->title}} | @stop

@section('content')
    <h1>{{$post->title}}</h1>
    <h5>{{$post->published_at->format('M jS Y g:ia')}}</h5>
    <hr>
        {!! nl2br(e($post->content)) !!}
    <hr>
    <button class="button" onclick="history.go(-1)"> < Back</button>
@stop

@section('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
            });
        }(jQuery));
    </script>
@stop
