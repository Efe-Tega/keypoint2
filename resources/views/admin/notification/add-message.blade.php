@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Add Message Notification</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form id="msgForm" action="{{ route('upload.message') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Message Title</label>
                                    <input type="text" class="form-control" id="movie-title" name="title"
                                        placeholder="Enter Message title" required>

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <input type="text" class="form-control" name="slug" id="task-slug" hidden readonly> --}}

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Notification Type</label>
                                    <select name="type" id="notificationType" class="form-select">
                                        <option value="general" selected>General Notification</option>
                                        <option value="specific">User-Defined Notification</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" id="specificUserInput" style="display: none">
                            <div class="mb-3">
                                <label for="" class="form-label">Message Key</label>
                                <input type="text" class="form-control" id="" name="message_key"
                                    placeholder="enter unique key" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea id="elm1" name="content"></textarea>

                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Add Notification
                            </button>

                            <button class="btn btn-success d-none" id="spinner" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Adding notification...
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

            document.getElementById('notificationType').addEventListener('change', function() {
                const specificInput = document.getElementById('specificUserInput');

                if (this.value === 'specific') {
                    specificInput.style.display = 'block';
                } else {
                    specificInput.style.display = 'none';
                }
            });
        });
    </script>
@endsection
