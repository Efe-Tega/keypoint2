@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>User List</x-slot:heading>
        <a href="" class="btn btn-primary">Add User</a>
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <x-tables :columns="['S/N', 'Commission Balance', 'Email', 'Phone', 'Status', 'Date Registered', 'Action']">
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ number_format($user->wallet->com_wallet, 2) }} NGN
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm">Active</button>
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('user.details', $user->id) }}" class="btn btn-info btn-sm">Manage</a>
                                </td>
                            </tr>
                        @endforeach
                    </x-tables>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
