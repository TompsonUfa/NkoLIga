@extends('layouts.app')

@section('content')
    <admin-news-create></admin-news-create>
@endsection

@push('scripts')
    @vite('resources/js/pages/admin-news-create.js')
@endpush

