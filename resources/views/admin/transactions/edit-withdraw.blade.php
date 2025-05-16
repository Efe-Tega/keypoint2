@extends('admin.admin-master')
@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Update Transaction Status</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Withdrawal Update</h4>

                    <form method="POST" action="{{ route('update.withdrawal') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $transaction->id }}">

                        <div class="mb-3">
                            <label>Transaction Id</label>
                            <input type="text" class="form-control" name="trans_id" value="{{ $transaction->trans_id }}"
                                readonly />

                            @error('trans_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount"
                                value="{{ number_format($transaction->amount) }}" readonly />

                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" id="" class="form-select">
                                <option value="pending" {{ $transaction->status === 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="success" {{ $transaction->status === 'success' ? 'selected' : '' }}>Success
                                </option>
                                <option value="failed" {{ $transaction->status === 'failed' ? 'selected' : '' }}>Failed
                                </option>
                            </select>
                        </div>

                        <button class="btn btn-primary">Update</button>

                    </form>

                </div>
            </div>
        </div> <!-- end col -->

    </div>
@endsection
