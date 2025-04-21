@extends('admin.admin-master')
@section('content')
    <!-- start page title -->

    <x-admin.page-title>
        <x-slot:heading>Level Management</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Add New Level</h4>

                    @if (session('success'))
                        <div id="successMessage" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="uploadForm" class="" action="{{ route('add.level') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter Level name"
                                        name="level">

                                    @error('level')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Amount</label>
                                    <input type="text" class="form-control" id="" name="level_amount"
                                        placeholder="Enter level amount">

                                    @error('level_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit" id="uploadBtn">
                                Add Level
                            </button>

                            <button class="btn btn-success d-none" id="spinner" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Adding level...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Levels</h4>

                    <x-tables :columns="['S/N', 'Level', 'Level Amount', 'Action']">
                        @foreach ($levels as $key => $level)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $level->level }}</td>
                                <td>{{ $level->amount }} NGN</td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-level" data-bs-toggle="modal"
                                        data-bs-target=".level-modal" data-level="{{ $level->level }}"
                                        data-amount="{{ $level->amount }}" data-id="{{ $level->id }}"
                                        data-action="{{ route('update.level', $level->id) }}">Edit</button>

                                    <a href="{{ route('delete.level', $level->id) }}" class="btn btn-danger btn-sm"
                                        id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </x-tables>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Credit/Debit User Model -->
    <div class="modal fade level-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf

                        <input type="hidden" name="id" id="level-id">

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Level</label>
                                <input type="text" class="form-control" id="level" name="level"
                                    placeholder="Enter level name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" name="level_amount"
                                    placeholder="Enter level amount" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
