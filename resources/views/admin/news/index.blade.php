@extends('layouts.app')

@section('content')
    <admin-news></admin-news>
@endsection

@push('scripts')
    @vite('resources/js/pages/admin-news.js')
@endpush

