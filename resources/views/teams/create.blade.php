@extends('layouts.app')
@section('title', 'TN | Add Team')
@section('mainn')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12">
                {{-- <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i
                                    class="icon-base bx bx-user icon-sm me-1_5"></i> Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-security.html"><i
                                    class="icon-base bx bx-lock-alt icon-sm me-1_5"></i> Security</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-billing.html"><i
                                    class="icon-base bx bx-detail icon-sm me-1_5"></i> Billing & Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-notifications.html"><i
                                    class="icon-base bx bx-bell icon-sm me-1_5"></i> Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages-account-settings-connections.html"><i
                                    class="icon-base bx bx-link-alt icon-sm me-1_5"></i> Connections</a>
                        </li>
                    </ul>
                </div> --}}
                <div class="card mb-6">
                    <!-- Account -->
                  
                    <div class="card-body pt-4">
                        <form id="formAccountSettings" method="POST" action="{{ route('teams.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-6">
                               
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Team Name</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                       placeholder="" />
                                </div>
                                <div class="col-md-6">
                                    <label for="description" class="form-label">Description</label>
                                    <input class="form-control" type="text" id="description" name="description" />
                                </div>
                                
                                <div class="mt-6">
                                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
               
            </div>
        </div>

    </div>
    <!-- / Content -->
@endsection
