@extends('admin.admin-master')
@section('content')
    <x-admin.page-title>
        <x-slot:heading>Efe Tega</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>

    {{-- Profile Info --}}
    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">

                    @if (session('success'))
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: '{{ session('success') }}',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });
                            });
                        </script>
                    @endif

                    <div class="mt-4 mt-md-0 text-center">
                        <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200"
                            src=" {{ asset('admin/upload/profile-pics/blank_profile_pic.png') }}" data-holder-rendered="true">
                        <h3 class="mt-3">{{ $user->fullname }}</h3>
                        <h5>{{ $user->email }}</h5>
                        <h6>{{ $user->phone }}</h6>
                    </div>

                    <hr>

                    <div class="mt-5">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Account Balance:</div>
                            <div> {{ number_format($user->wallet->acct_bal, 2) }} <span>NGN </span></div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Upgrade Deposit:</div>
                            <div> {{ number_format($user->wallet->deposit_wallet, 2) }} <span>NGN </span></div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Commission Wallet:</div>
                            <div> {{ number_format($user->wallet->com_wallet, 2) }} <span>NGN </span></div>
                        </div>

                        <hr>

                        <!-- Bank Information -->
                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Bank Name:</div>
                            <div>{{ $bank->bank_name }}</div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Name on Account:</div>
                            <div>{{ $bank->acct_name }}</div>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Account Number:</div>
                            <div>{{ $bank->acct_no }}</div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <div class="card-text text-capitalize">User Account Status:</div>

                            <div class="square-switch">
                                <input type="checkbox" id="square-switch-{{ $user->id }}" switch="none"
                                    {{ $user->status == 1 ? 'checked' : '' }}
                                    onchange="toggleUserStatus({{ $user->id }})" />
                                <label for="square-switch-{{ $user->id }}" data-on-label="Active"
                                    data-off-label="Blocked"></label>
                            </div>
                        </div>
                        {{-- 
                        <div class="d-flex justify-content-between">
                            <div class="card-text text-capitalize">Withdrawal:</div>

                            <div class="square-switch">
                                <input type="checkbox" id="withdraw-status-{{ $user->id }}" switch="none"
                                    {{ $user->withdraw_status == 1 ? 'checked' : '' }}
                                    onchange="toggleWithdrawStatus({{ $user->id }})" />
                                <label for="withdraw-status-{{ $user->id }}" data-on-label="Enable"
                                    data-off-label="Disable"></label>
                            </div>
                        </div> --}}

                        <div class="d-flex justify-content-between mb-2">
                            <div class="card-text text-capitalize">Level:</div>
                            <div>{{ $user->level->level }}</div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Manage Account</h4>

                        <div class="button-items">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                                data-bs-target=".credit-debit-modal">Credit/Debit User</button>

                            <button type="button" id="resetBtn" class="btn btn-warning waves-effect waves-light"
                                data-bs-toggle="modal" data-action="{{ route('reset.password', $user->id) }}"
                                data-bs-target=".reset-password">Reset Password</button>

                            <button type="button" class="btn btn-danger">Delete User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Update Bio Data</h4>
                    <span class="text-danger">All fields are required</span>

                    <form method="POST" action="{{ route('update.user') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- 
                        <div class="mb-3">
                            <label>Profile Pics</label>
                            <input type="file" name="profile_pic" class="form-control" />
                        </div> --}}
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}"
                                placeholder="Full Name" />

                            @error('fullname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                placeholder="Email Address" />

                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                placeholder="Enter Mobile Number" />

                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Level</label>
                            <select name="level_id" id="" class="form-select">
                                <option value="{{ $user->level_id }}">{{ $user->level->level }}</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-primary">Update</button>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Manage Account</h4>

                    <x-tables :columns="['S/N', 'Type', 'Transaction ID', 'Amount', 'Status', 'Date', 'Action']">
                        @foreach ($transactions as $key => $transaction)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->trans_id }}</td>
                                <td>
                                    {{ number_format($transaction->amount, 2) }} NGN
                                </td>

                                <td>{{ strtoupper($transaction->status) }}</td>
                                <td>{{ $transaction->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit.transaction', ['id' => $transaction->id, 'type' => $transaction->type]) }}"
                                        class="btn btn-primary btn-sm">Edit status</a>
                                </td>
                            </tr>
                        @endforeach
                    </x-tables>
                </div>
            </div>
        </div>
    </div> <!-- end row -->


    <!-- Credit/Debit User Model -->
    <div class="modal fade credit-debit-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Credit/Debit User Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="subject">Subject</label>
                                <textarea class="form-control" id="subject" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Resete Password modal -->
    <div class="modal fade reset-password" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Trading History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <span><strong>{{ $user->fullname }}</strong> password will be changed to <strong
                                        class="text-danger">user01236</strong> </span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Change</button>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <script>
        function toggleUserStatus(userId) {
            fetch('/admin/users/toggle-status/' + userId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                }).then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    toastr.success(data.message);
                }).catch(error => {
                    console.error('Error', error);
                    alert('Something went wrong!');

                });
        }
    </script>

    <script>
        function toggleWithdrawStatus(userId) {
            fetch('/admin/withdraw/toggle-status/' + userId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    toastr.success(data.message);
                }).catch(error => {
                    console.log('Error', error);
                    alert('Something went wrong!');
                })
        }
    </script>

    <script>
        const resetBtn = document.getElementById('resetBtn');
        resetBtn.addEventListener('click', function() {
            const action = this.getAttribute('data-action');

            document.querySelector('.reset-password form').action = action;
        });
    </script>
@endsection
