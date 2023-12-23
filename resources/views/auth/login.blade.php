@extends('app')

@section('content')
    <auth-index></auth-index>
@endsection

@push('scripts')
    @vite('resources/js/pages/login.js')
@endpush
