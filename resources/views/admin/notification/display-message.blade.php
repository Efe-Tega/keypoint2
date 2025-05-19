@extends('admin.admin-master')

@section('title')
    {{ __('Message Details') }}
@endsection

@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Message Details</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $detail->title }}</h3>
                    <hr>
                    <div class="">
                        {!! $detail->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
