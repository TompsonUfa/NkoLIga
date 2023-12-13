@extends('layouts.app')

@section('content')
    <index-vue></index-vue>
@endsection

@push('scripts')
    @vite('resources/js/app.js')
@endpush

