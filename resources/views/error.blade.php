@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ session('flash_notification.message') }}
        </div>
    @endif
@endsection

@push('scripts')

@endpush