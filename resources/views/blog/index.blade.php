@extends('layouts.default.default')

@section('styles')

@stop

@section('content')
    <h1> {{config('blog.title')}}</h1>
    <h5>Page {{$posts->currentPage()}} of {{$posts->lastPage()}}</h5>
    <hr>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="/blog/{{$post->slug}}">{{$post->title}}</a>
                <em>({{$post->published_at->format('M jS Y g:ia')}})</em>
                <p>
                    {{str_limit($post->content)}}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    @include('pagination.custom', ['paginator' => $posts])
@stop

@section('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
            });
        }(jQuery));
    </script>
@stop
