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
                        @foreach ($deposits as $key => $deposit)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $deposit->user->fullname }}</td>
                                <td>{{ $deposit->trans_id }}</td>
                                <td>
                                    {{ number_format($deposit->amount, 2) }} NGN
                                </td>

                                @if ($deposit->status === 'pending')
                                    <td class="text-warning text-capitalize">{{ $deposit->status }}</td>
                                @elseif($deposit->status === 'failed')
                                    <td class="text-danger text-capitalize">{{ $deposit->status }}</td>
                                @else
                                    <td class="text-success text-capitalize">{{ $deposit->status }}</td>
                                @endif

                                <td>{{ $deposit->created_at }}</td>
                                <td>
                                    <a href="{{ route('edit.deposit', $deposit->id) }}" class="btn btn-primary btn-sm">Edit
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
