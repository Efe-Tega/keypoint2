@extends('admin.admin-master')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    @if (request('message'))
                        <div id="successMessage" class="alert alert-success" role="alert">
                            {{ request('message') }}
                        </div>
                    @endif

                    <form id="uploadForm" action="{{ route('post.video') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Movie Title</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        placeholder="Enter movie title" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Level</label>
                                    <select name="" id="" class="form-select">
                                        <option value="">Internship</option>
                                        <option value="">VIP1</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Thumbnail</label>
                                    <input type="file" class="form-control" id="" placeholder="First name"
                                        name="uploadMe" id="uploadMe" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video File</label>
                                    <input type="file" class="form-control" id="" placeholder="First name"
                                        name="uploadMe" id="uploadMe" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label>Summary</label>
                                <div>
                                    <textarea required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div id="progressBarContainer" class="progress mb-3 d-none">
                                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 0%"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">Upload
                                video</button>
                            {{-- <button class="btn btn-primary" type="submit">Upload Video</button> --}}
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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
    </script>

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
