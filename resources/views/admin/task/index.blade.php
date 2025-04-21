@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>All Tasks</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Select Level</h4>

                    <form action="{{ route('get.task') }}" class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="">Select
                                                Level</span>
                                        </div>
                                        <select name="level_id" class="form-select" id="" required>
                                            <option selected disabled value="">Select level...</option>
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->level }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit">View Tasks</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    @isset($tasks)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">
                            @foreach ($tasks as $task)
                                {{ $task->level->level }}
                            @endforeach
                            Task List
                        </h4>

                        <x-tables :columns="['S/N', 'Movie Name', 'Description', 'Date Created', 'Thumbnail', 'Action']">

                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! Str::limit($task->movie_title, 25) !!}</td>
                                    <td>{!! Str::limit($task->summary, 20) !!}</td>
                                    <td>{{ $task->created_at->diffForHumans() }}</td>
                                    <td>
                                        <img src="{{ $cloudfrontUrl . '/' . $task->thumbnail }}" alt="" width="70px"
                                            class="rounded" height="50px">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.task', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('delete.task', $task->id) }}" class="btn btn-danger btn-sm"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </x-tables>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endisset
@endsection
