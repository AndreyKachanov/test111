@php
@endphp
@extends('layouts.app')

@section('custom_css')
{{--    <style>--}}
{{--        body {--}}
{{--            background-color: #b4aaaa;--}}
{{--        }--}}
{{--    </style>--}}
@endsection

{{--@section('breadcrumbs', '')--}}

@section('content')
    <div class="test">test</div>
{{--    <test-component></test-component>--}}
@endsection
@section('scripts')
    <script>
        console.log(123);
        try {
            $(document).ready(function(){
                $(".test").css("color", "blue").css("font-size", "30px");
            });
        } catch (e) {
            console.log(e);
        }
    </script>
@endsection

