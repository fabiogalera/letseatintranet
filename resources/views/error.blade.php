@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
    @if (session()->has('message'))
        <div class="alert alert-{{ session('level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ session('message') }}
        </div>
    @endif
@endsection

@push('scripts')

@endpush