@extends('layouts.app')
@section('title' ,'Account Setting')
@section('mainn')
     <!-- Content -->
     <div class="container-xxl flex-grow-1 container-p-y">
          
        <div class="row">
          <div class="col-md-12">
            <div class="nav-align-top">
              <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-md-0 gap-2">
                <li class="nav-item">
                  <a class="nav-link active" href="javascript:void(0);"><i class="icon-base bx bx-user icon-sm me-1_5"></i> Account</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages-account-settings-security.html"><i class="icon-base bx bx-lock-alt icon-sm me-1_5"></i> Security</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages-account-settings-billing.html"><i class="icon-base bx bx-detail icon-sm me-1_5"></i> Billing & Plans</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages-account-settings-notifications.html"><i class="icon-base bx bx-bell icon-sm me-1_5"></i> Notifications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages-account-settings-connections.html"><i class="icon-base bx bx-link-alt icon-sm me-1_5"></i> Connections</a>
                </li>
              </ul>
            </div>
            <div class="card mb-6">
              <!-- Account -->
              <div class="card-body">
              
              </div>
              <div class="card-body pt-4">
                <form id="formAccountSettings" method="POST" action="{{route('account-settings' , $user->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                  <div class="row g-6">
                    <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                        <img src="{{asset('../../storage/'.$user->avatar)}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="icon-base bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" name="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                            <i class="icon-base bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>
            
                          <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="fistname" class="form-label">First Name</label>
                        <input class="form-control" type="text" id="fistname" name="fistname" value="{{$user->fistname}}" placeholder="Thiện" />
                      </div>
                      <div class="col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input class="form-control" type="text" id="lastname" name="lastname" value="{{$user->lastname}}" placeholder="Trần" />
                      </div>
                    <div class="col-md-6 form-control-validation">
                      <label for="username" class="form-label">UserName</label>
                      <input class="form-control" type="text" id="username" name="username" value="{{$user->username}}" autofocus />
                    </div>
                
                    <div class="col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input class="form-control" type="text" id="email" name="email" value="{{$user->email}}" placeholder="john.doe@example.com" />
                    </div>
                    <div class="col-md-6">
                      <label for="phone" class="form-label">Phone</label>
                      <input class="form-control" type="text" id="phone" name="phone" value="{{$user->phone}}" placeholder="075275597" />
                    </div>
                    <div class="col-md-6">
                      <label for="address" class="form-label">Address</label>
                      <input class="form-control" type="text" id="address" name="address" value="{{$user->address}}"  />
                    </div>
                    <div class="col-md-6">
                      <label for="language" class="form-label">Language</label>
                      <input class="form-control" type="text" id="language" name="language" value="{{$user->language}}"  />
                    </div>
                    <div class="col-md-6">
                      <label for="topic" class="form-label">Topic</label>
                      <input class="form-control" type="text" id="topic" name="topic" value="{{$user->topic}}"  />
                    </div>
                    <div class="col-md-6">
                      <label for="skype" class="form-label">Skype</label>
                      <input class="form-control" type="text" id="skype" name="skype" value="{{$user->skype}}"  />
                    </div>
                    
                    

                    
                    
                   
                  <div class="mt-6">
                    <button type="submit" class="btn btn-primary me-3">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                  </div>
                </form>
              </div>
              <!-- /Account -->
            </div>
            <div class="card">
              <h5 class="card-header">Delete Account</h5>
              <div class="card-body">
                <div class="mb-6 col-12 mb-0">
                  <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                  </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false">
                  <div class="form-check my-8 ms-2">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                  </div>
                  <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      
              </div>
              <!-- / Content -->
@endsection
