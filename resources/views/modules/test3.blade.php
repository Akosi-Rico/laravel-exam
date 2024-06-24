@extends('layout.app')
@section("body")
    <parent
        :data="{{ json_encode($data) }}">
    </parent>
@endsection


