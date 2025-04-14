@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">User List</h4>
                <a href="" class="btn btn-primary">Add User</a>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <x-tables :columns="['S/N', 'Account Balance', 'Email', 'Phone', 'Status', 'Date Registered', 'Action']">
                        {{-- @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span>{{ $user->currency }}</span>
                                    {{ $user->account_bal }}
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Active</button>
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('admin.user.details', $user->id) }}"
                                        class="btn btn-info btn-sm">Manage</a>
                                </td>
                            </tr>
                        @endforeach --}}

                        <tr>
                            <td>1</td>
                            <td>5000 NGN</td>
                            <td>example@gmail.com</td>
                            <td>090238484859</td>
                            <td>
                                <button class="btn btn-success btn-sm">Active</button>
                            </td>
                            <td>Today</td>
                            <td>
                                <a href="{{ route('user.details') }}" class="btn btn-info btn-sm">Manage</a>
                            </td>
                        </tr>
                    </x-tables>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
