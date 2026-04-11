@extends('layouts.app')

@section('content')
    @if (auth()->user()->role == 'admin')
        @include('dashboard.admin')
    @endif

    @if (auth()->user()->role == 'teacher')
        @include('dashboard.teacher')
    @endif

    @if (auth()->user()->role == 'student')
        @include('dashboard.student')
    @endif
@endsection
