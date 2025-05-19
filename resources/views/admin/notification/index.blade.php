@extends('admin.admin-master')

@section('title')
    {{ __('Message Notification') }}
@endsection

@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>All Message Notification</x-slot:heading>
        <a href="{{ route('add.message') }}" class="btn btn-primary">Add Notification</a>
    </x-admin.page-title>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">General Message Notification</h4>
                    <p class="card-title-desc">All users receive the message below at ones when the <span
                            class="text-danger">Send Notification</span> button is clicked
                    </p>

                    <x-tables :columns="['S/N', 'Title', 'Message', 'Date Created', 'Action']">
                        @foreach ($generalMsg as $key => $msg)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{!! Str::limit($msg->title, 30) !!}</td>
                                <td>{!! Str::limit($msg->content, 20) !!}</td>
                                <td>{{ $msg->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('edit.message', $msg->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('delete.message', $msg->id) }}" class="btn btn-danger btn-sm"
                                        title="delete" id="delete">Delete</a>
                                    <a href="{{ route('send.notification', $msg->id) }}" class="btn btn-info btn-sm">Send
                                        Notification</a>
                                    <a href="{{ route('open.message', $msg->id) }}"
                                        class="btn btn-outline-primary btn-sm text-nowrap">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </x-tables>

                </div>
            </div>
        </div> <!-- end col -->


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User-Defined Message Notification</h4>
                    <p class="card-title-desc"> This is automatically sent to any user based on user action/activity
                    </p>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($definedMessages as $key => $message)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{!! Str::limit($message->title, 30) !!}</td>
                                        <td>{!! Str::limit($message->content, 20) !!}</td>
                                        <td>{{ $message->created_at->diffForHumans() }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('edit.message', $message->id) }}"
                                                class="btn btn-primary btn-sm ">Edit</a>

                                            <a href="{{ route('open.message', $message->id) }}"
                                                class="btn btn-info btn-sm text-nowrap">View Message</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
