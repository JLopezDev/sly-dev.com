@extends('layouts.default.default')

@section('content')
    <h1>Hello World</h1>
    <button id="button">Click Me</button>
@stop

@section('scripts')
    <script>
        (function ($) {
            $(document).ready(function () {
                var $btn = $('#button');
                $btn.on('click', function () {
                    console.log('Hello World...');
                });
            });
        }(jQuery));
    </script>
@stop
