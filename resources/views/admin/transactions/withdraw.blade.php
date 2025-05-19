@extends('admin.admin-master')

@section('title')
    {{ __('Deposit Transaction') }}
@endsection

@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Deposit Transactions</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <x-tables :columns="['S/N', 'User', 'Transaction ID', 'Amount', 'Status', 'Date', 'Action']">
                        @foreach ($withdrawals as $key => $withdraw)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $withdraw->user->fullname }}</td>
                                <td>{{ $withdraw->trans_id }}</td>
                                <td>
                                    {{ number_format($withdraw->amount, 2) }} NGN
                                </td>

                                @if ($withdraw->status === 'pending')
                                    <td class="text-capitalize text-warning">{{ $withdraw->status }}</td>
                                @elseif ($withdraw->status === 'failed')
                                    <td class="text-capitalize text-danger">{{ $withdraw->status }}</td>
                                @else
                                    <td class="text-capitalize text-success">{{ $withdraw->status }}</td>
                                @endif

                                <td>{{ $withdraw->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit.withdrawal', $withdraw->id) }}"
                                        class="btn btn-primary btn-sm">Edit
                                        Status</a>
                                </td>
                            </tr>
                        @endforeach
                    </x-tables>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
