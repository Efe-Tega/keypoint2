@extends('admin.admin-master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- @if (request('message'))
                    @endif --}}

                    <form id="uploadForm" action="{{ route('post.video') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Movie Title</label>
                                    <input type="text" class="form-control" id="" name="movie_title"
                                        placeholder="Enter movie title" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Level</label>
                                    <select name="level" id="" class="form-select">
                                        <option value="internship">Internship</option>
                                        <option value="vip1">VIP1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Thumbnail</label>
                                    <input type="file" class="form-control" id="" placeholder="First name"
                                        name="imgUpload" accept="image/*" required>
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
                            <div id="progressBarContainer" class="progress mb-3 d-none">
                                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>

                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Upload video
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById('successMessage');

            if (successMessage) {
                // Set a timer to hide the message after 5 seconds
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // 5000ms = 5 seconds
            }
        });
    </script>
@endsection
