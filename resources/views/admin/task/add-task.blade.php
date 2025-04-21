@extends('admin.admin-master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="uploadForm" action="{{ route('post.task') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Movie Title</label>
                                    <input type="text" class="form-control" id="movie-title" name="movie_title"
                                        placeholder="Enter movie title" required>
                                </div>
                            </div>

                            <input type="text" class="form-control" name="slug" id="task-slug" hidden readonly>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level_id" id="" class="form-select">
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

                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                        alt="Card image cap">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video File</label>
                                    <input type="file" class="form-control" id="" placeholder="First name"
                                        accept="video/*" name="uploadMe" id="uploadMe" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label>Summary</label>
                                <div>
                                    <textarea required class="form-control" rows="5" name="summary"></textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Upload Task
                            </button>

                            <button class="btn btn-success d-none" id="spinner" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Adding task...
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

    {{-- <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const progressBarContainer = document.getElementById('progressBarContainer');
            const progressBar = document.getElementById('progressBar');

            progressBarContainer.classList.remove('d-none');

            progressBar.style.width = '0%';
            progressBar.setAttribute('aria-valuenow', 0);
            progressBar.innerText = '0%';

            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener("progress", (event) => {
                if (event.lengthComputable) {
                    const percentComplete = Math.round((event.loaded / event.total) * 100);
                    progressBar.style.width = percentComplete + '%';
                    progressBar.setAttribute('aria-valuenow', percentComplete);
                    progressBar.innerText = percentComplete + '%';
                }
            });

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        window.location.href = response.redirect;
                    } else {
                        alert("Error while uploading")
                    }

                    progressBarContainer.classList.add('d-none');
                }

            };

            xhr.open("POST", this.action, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
            xhr.send(formData);
        });
    </script> --}}

    {{-- <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const fileInputs = this.querySelectorAll('input[type="file"]');
            let isVideo = false;

            // Loop through both file inputs to check for any video file
            fileInputs.forEach(input => {
                for (let i = 0; i < input.files.length; i++) {
                    if (input.files[i].type.startsWith('video/')) {
                        isVideo = true;
                        break;
                    }
                }
            });

            const progressBarContainer = document.getElementById('progressBarContainer');
            const progressBar = document.getElementById('progressBar');

            if (isVideo) {
                progressBarContainer.classList.remove('d-none');
                progressBar.style.width = '0%';
                progressBar.setAttribute('aria-valuenow', 0);
                progressBar.innerText = '0%';
            }

            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener("progress", (event) => {
                if (event.lengthComputable && isVideo) {
                    const percentComplete = Math.round((event.loaded / event.total) * 100);
                    progressBar.style.width = percentComplete + '%';
                    progressBar.setAttribute('aria-valuenow', percentComplete);
                    progressBar.innerText = percentComplete + '%';
                }
            });

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        window.location.href = response.redirect;
                    } else {
                        alert("Error while uploading");
                    }

                    if (isVideo) {
                        progressBarContainer.classList.add('d-none');
                    }
                }
            };

            xhr.open("POST", this.action, true);
            xhr.setRequestHeader("X-CSRF-TOKEN", '{{ csrf_token() }}');
            xhr.send(formData);
        });
    </script> --}}
@endsection
