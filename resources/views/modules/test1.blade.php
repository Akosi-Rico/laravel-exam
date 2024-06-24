@extends('layout.app')
@section("body")
    <test1
        :data="{{ json_encode($data) }}">
    </test1>
@endsection


