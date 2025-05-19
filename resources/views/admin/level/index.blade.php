@extends('admin.admin-master')

@section('title')
    {{ __('Level Management') }}
@endsection

@section('content')
    <!-- start page title -->

    <x-admin.page-title>
        <x-slot:heading>Level Management</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
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
                                    <label for="" class="form-label">Upgrade Amount</label>
                                    <input type="text" class="form-control" id="" name="upgrade_amount"
                                        placeholder="Enter upgrade amount">

                                    @error('upgrade_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Reward Amount</label>
                                    <input type="text" class="form-control" id="" name="reward_amount"
                                        placeholder="Enter reward amount">

                                    @error('reward_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Daily Task</label>
                                    <input type="number" class="form-control" id="" name="daily_task"
                                        placeholder="Enter number of task per day">

                                    @error('daily_task')
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
                                Adding level ...
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

                    <x-tables :columns="['S/N', 'Level', 'Upgrade Amount', 'Reward Amount', 'Daily Task', 'Action']">
                        @foreach ($levels as $key => $level)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $level->level }}</td>
                                <td>{{ number_format($level->upgrade_amount) }} NGN</td>
                                <td>{{ $level->reward_amount }} NGN</td>
                                <td>{{ $level->daily_task }} times</td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-level" data-bs-toggle="modal"
                                        data-bs-target=".level-modal" data-level="{{ $level->level }}"
                                        data-upgradeamount="{{ $level->upgrade_amount }}"
                                        data-rewardamount="{{ $level->reward_amount }}"
                                        data-dailyTask="{{ $level->daily_task }}" data-id="{{ $level->id }}"
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
                                <label class="form-label">Upgrade Amount</label>
                                <input type="text" class="form-control" id="upgrade-amount" name="upgrade_amount"
                                    placeholder="Enter level amount" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Reward Amount</label>
                                <input type="text" class="form-control" id="reward-amount" name="reward_amount"
                                    placeholder="Enter level amount" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Daily Task</label>
                                <input type="text" class="form-control" id="daily-task" name="daily_task"
                                    placeholder="Enter number of task per day" required>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-level');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get the data attributes
                    const id = this.getAttribute('data-id');
                    const level = this.getAttribute('data-level');
                    const upgradeAmount = this.getAttribute('data-upgradeamount');
                    const rewardAmount = this.getAttribute('data-rewardamount');
                    const dailyTask = this.getAttribute('data-dailyTask');
                    const action = this.getAttribute('data-action');

                    // Set the form values
                    document.getElementById('level-id').value = id;
                    document.getElementById('level').value = level;
                    document.getElementById('upgrade-amount').value = upgradeAmount;
                    document.getElementById('reward-amount').value = rewardAmount;
                    document.getElementById('daily-task').value = dailyTask;

                    // Update form action URL
                    document.querySelector('.level-modal form').action = action;
                });
            });
        });
    </script>
@endsection
