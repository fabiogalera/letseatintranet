@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
    <div class="row">
    @if (session()->has('message'))
        <div class="alert alert-{{ session('level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ session('message') }}
        </div>
    @endif
    </div>
@endsection

@push('scripts')

@endpush