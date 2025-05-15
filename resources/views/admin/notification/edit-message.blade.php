@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Edit Message Notification</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form id="msgForm" action="{{ route('update.message') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <input type="hidden" name="id" value="{{ $msg->id }}">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Message Title</label>
                                    <input type="text" class="form-control" id="movie-title" name="title"
                                        placeholder="Enter movie title" value="{{ $msg->title }}" required>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <input type="text" class="form-control" name="slug" id="task-slug" hidden readonly> --}}

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Notification Type</label>
                                    <select name="type" id="" class="form-select">
                                        <option value="specific" {{ $msg->type === 'specific' ? 'selected' : '' }}>
                                            User-Defined Notification</option>
                                        <option value="general" {{ $msg->type === 'general' ? 'selected' : '' }}>General
                                            Notification</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea id="elm1" name="content">{{ $msg->content }}</textarea>

                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Update Message
                            </button>

                            <button class="btn btn-success d-none" id="spinner" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                updating message...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Form spinner
            const uploadForm = document.getElementById('msgForm');
            if (uploadForm) {
                uploadForm.addEventListener('submit', function() {
                    const uploadBtn = document.getElementById('uploadBtn');
                    const spinner = document.getElementById('spinner');
                    if (uploadBtn) uploadBtn.classList.add('d-none');
                    if (spinner) spinner.classList.remove('d-none');
                });
            }
        })
    </script>
@endsection
