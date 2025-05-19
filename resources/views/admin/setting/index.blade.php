@extends('admin.admin-master')

@section('title')
    {{ __('General Settings') }}
@endsection

@section('content')
    <!-- start page title -->
    <x-admin.page-title>
        <x-slot:heading>Settings</x-slot:heading>
        <x-back-button />
    </x-admin.page-title>
    <!-- end page title -->

    {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Something Settings</h4>
                    <p class="card-title-desc">Provide valuable, actionable feedback to your users with
                        HTML5 form validation–available in all our supported browsers.</p>

                    <form class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom03" class="form-label">Currency</label>
                                    <select class="form-select" id="validationCustom03" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option> NGN </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02"
                                        placeholder="Last name" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bootstrap Validation (Tooltips)</h4>
                    <p class="card-title-desc">If your form layout allows it, you can swap the
                        <code>.{valid|invalid}-feedback</code> classes for
                        <code>.{valid|invalid}-tooltip</code> classes to display validation feedback in a
                        styled tooltip.
                    </p>
                    <form class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationTooltip01"
                                        placeholder="First name" value="Mark" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationTooltip02"
                                        placeholder="Last name" value="Otto" required>
                                    <div class="valid-tooltip">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltipUsername" class="form-label">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationTooltipUsername"
                                            placeholder="Username" aria-describedby="validationTooltipUsernamePrepend"
                                            required>
                                        <div class="invalid-tooltip">
                                            Please choose a unique and valid username.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">State</label>
                                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State"
                                        required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid state.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip03" class="form-label">City</label>
                                    <input type="text" class="form-control" id="validationTooltip03" placeholder="City"
                                        required>
                                    <div class="invalid-tooltip">
                                        Please provide a valid city.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>

                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> --}}
@endsection
