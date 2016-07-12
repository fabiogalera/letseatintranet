@extends('layouts.blank')

@push('stylesheets')

@endpush

@section('main_container')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
    @if (session()->has('message'))
        <div class="alert alert-{{ session('level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {{ session('message') }}
        </div>
    @endif
            </div>
    </div>
@endsection

@push('scripts')

@endpush