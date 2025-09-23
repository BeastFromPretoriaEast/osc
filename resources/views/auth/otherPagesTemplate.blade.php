@extends('layouts.auth')
@section('title', 'Register')
@section('content')
    {{-- Your register form here --}}
@endsection

@push('scripts')
    @vite(['resources/js/auth/register.js'])
@endpush
