@extends('layouts.admin_master')
@section('page_title', 'Admin - Profile')
@section('admin_main_content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile Settings /</span> My Profile</h4>
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
                    Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages-account-settings-connections.html"><i class="bx bx-link-alt me-1"></i>
                    Connections</a>
            </li>
        </ul>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ auth()->guard('admin')->user()->profile ? auth()->user()->guard('admin')->profile : env('DICEBEAR_LINK'). auth()->guard('admin')->user()->name }}"
                        alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                    <div class="button-wrapper">
                        <form action="">
                            <label for="upload" class="btn btn-outline-secondary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Select new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden=""
                                    accept="image/png, image/jpeg"
                                    oninput="imageUploadPreview(event, 'uploadedAvatar')">
                            </label>
                            <button type="button" class="btn btn-primary mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Upload Photo</span>
                            </button>
                        </form>

                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" id="firstName" name="firstName"
                                value="{{auth()->guard('admin')->user()->name }}" autofocus="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{auth()->guard('admin')->user()->email }}"
                                placeholder="john.doe@example.com">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                                {{-- <span class="input-group-text">BD (+880)</span> --}}
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                    placeholder="202 555 0111" value="{{auth()->guard('admin')->user()->phone }}">
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Country</label>
                            <select id="country" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="Australia">Australia</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Canada">Canada</option>
                                <option value="China">China</option>
                                <option value="France">France</option>
                                <option value="Germany">Germany</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Japan">Japan</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Russia">Russian Federation</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">State</label>
                            <input class="form-control" type="text" id="state" name="state" placeholder="California">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465"
                                maxlength="6">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">Change Password</h5>

            <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input class="form-control" type="text" id="current_password" name="current_password"
                                value="John" autofocus="">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="new_password" class="form-label">New Password</label>
                            <input class="form-control" type="text" name="new_password" id="new_password" value="Doe">
                        </div>
                        <div class="mb-3 col-12">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input class="form-control" type="text" name="new_password_confirmation"
                                id="password_confirmation" value="Doe">
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update Password</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <h5 class="card-header">Delete Account</h5>
            <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                    <div class="alert alert-warning">
                        <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                        <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                    </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                        <label class="form-check-label" for="accountActivation">I confirm my account
                            deactivation</label>
                    </div>
                    <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
