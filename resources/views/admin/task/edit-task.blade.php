@extends('admin.admin-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Update Tasks</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="uploadForm" action="{{ route('update.task') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="task_id" value="{{ $task->id }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Movie Title</label>
                                    <input type="text" class="form-control" id="movie-title" name="movie_title"
                                        placeholder="Enter movie title" value="{{ $task->movie_title }}" required>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="slug" id="task-slug"
                                value="{{ $task->slug }}" readonly>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level_id" id="" class="form-select">
                                        <option value="{{ $task->level_id }}">{{ $task->level->level }}</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Thumbnail</label>
                                    <input type="file" class="form-control" id="image" placeholder="First name"
                                        name="imgUpload" accept="image/*" required>
                                </div>

                                {{-- {{ $cloudfrontUrl . '/' . $video->thumbnail }} --}}
                                {{--  url('upload/no_image.jpg') --}}

                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage"
                                        src="{{ $task->thumbnail ? $cloudfrontUrl . '/' . $task->thumbnail : url('upload/no_image.jpg') }}"
                                        alt="{{ $task->movie_title }}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label>Summary</label>
                                <div>
                                    <textarea required class="form-control" rows="5" name="summary">{{ $task->summary }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Update Task
                            </button>

                            <button class="btn btn-success d-none" id="spinner" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                updating task...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
@endsection
