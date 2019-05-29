@extends('layouts.app')

@section('content')
    @foreach ($beverages as $beverage)
        <h1>{{ $beverage->name }}</h1>
    @endforeach
@endsection