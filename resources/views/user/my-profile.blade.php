@extends('layouts.app')
@section('title', 'TN | My Profile')
@section('mainn')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('../../assets/img/pages/profile-banner.png') }}" alt="Banner image"
                            class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                        <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                            <img src="{{ asset('../../storage/' . $user->avatar) }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img" />
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-7">{{ $user->fistname . ' ' . $user->lastname }} </h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                        <li class="list-inline-item"><i
                                                class="icon-base bx bx-palette me-2 align-top"></i><span
                                                class="fw-medium">{{ $user->topic }}</span></li>
                                        <li class="list-inline-item"><i class="icon-base bx bx-map me-2 align-top"></i><span
                                                class="fw-medium">{{ $user->address }}</span></li>
                                        <li class="list-inline-item"><i
                                                class="icon-base bx bx-calendar me-2 align-top"></i><span class="fw-medium">
                                                Tham gia: {{ $user->created_at->format('d/m/Y') }}</span></li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-primary mb-1"> <i
                                        class="icon-base bx bx-user-check icon-sm me-2"></i>Connected </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->

        <!-- Navbar pills -->
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-sm-0 gap-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i
                                    class="icon-base bx bx-user icon-sm me-1_5"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my-team') }}"><i
                                    class="icon-base bx bx-group icon-sm me-1_5"></i> Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="icon-base bx bx-grid-alt icon-sm me-1_5"></i> Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('friend.index')}}"><i
                                    class="icon-base bx bx-link icon-sm me-1_5"></i> Connections</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-6">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-body-secondary small">About</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-user"></i><span
                                    class="fw-medium mx-2">Full Name:</span>
                                <span>{{ $user->fistname . ' ' . $user->lastname }}</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-check"></i><span
                                    class="fw-medium mx-2">Status:</span> <span>Active</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-crown"></i><span
                                    class="fw-medium mx-2">Role:</span> <span
                                    style="text-transform: capitalize">{{ $user->role }}</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-flag"></i><span
                                    class="fw-medium mx-2">Country:</span>
                                <span>{{ $user->country != '' ? $user->country : 'Chưa cập nhật' }}</span></li>
                            <li class="d-flex align-items-center mb-2"><i class="icon-base bx bx-detail"></i><span
                                    class="fw-medium mx-2">Languages:</span>
                                <span>{{ $user->language != '' ? $user->language : 'Chưa cập nhật' }}</span></li>
                        </ul>
                        <small class="card-text text-uppercase text-body-secondary small">Contacts</small>
                        <ul class="list-unstyled my-3 py-1">
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-phone"></i><span
                                    class="fw-medium mx-2">Contact:</span>
                                <span>{{ $user->phone != '' ? $user->phone : 'Chưa cập nhật' }}</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-chat"></i><span
                                    class="fw-medium mx-2">Skype:</span>
                                <span>{{ $user->skype != '' ? $user->skype : 'Chưa cập nhật' }}</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-envelope"></i><span
                                    class="fw-medium mx-2">Email:</span>
                                <span>{{ $user->email != '' ? $user->email : 'Chưa cập nhật' }}</span></li>
                        </ul>
                        <small class="card-text text-uppercase text-body-secondary small">Teams</small>
                        <ul class="list-unstyled mb-0 mt-3 pt-1">
                            @foreach ($teamsWithUserCounts as $item)
                                <li class="d-flex flex-wrap"><span
                                        class="fw-medium me-2">{{ $item['team']->name }}</span><span>({{ $item['userCount'] }}
                                        Members)</span></li>
                            @endforeach
                            @if ($item['team'] = '')
                                <li class="d-flex flex-wrap"><span class="fw-medium me-2">Người Dùng chưa tham gia team
                                        nào</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!--/ About User -->
                <!-- Profile Overview -->
                <div class="card mb-6">
                    <div class="card-body">
                        <small class="card-text text-uppercase text-body-secondary small">Overview</small>
                        <ul class="list-unstyled mb-0 mt-3 pt-1">
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-check"></i><span
                                    class="fw-medium mx-2">Task Compiled:</span> <span>13.5k</span></li>
                            <li class="d-flex align-items-center mb-4"><i class="icon-base bx bx-star"></i><span
                                    class="fw-medium mx-2">Projects Compiled:</span> <span>146</span></li>
                            <li class="d-flex align-items-center"><i class="icon-base bx bx-user"></i><span
                                    class="fw-medium mx-2">Connections:</span> <span>897</span></li>
                        </ul>
                    </div>
                </div>
                <!--/ Profile Overview -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-6">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i
                                class="icon-base bx bx-bar-chart-alt-2 icon-lg text-body me-4"></i>Activity Timeline</h5>
                    </div>
                    <div class="card-body pt-3">
                        <ul class="timeline mb-0">
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-primary"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">12 Invoices have been paid</h6>
                                        <small class="text-body-secondary">12 min ago</small>
                                    </div>
                                    <p class="mb-2">Invoices have been paid to the company</p>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="badge bg-lighter rounded d-flex align-items-center">
                                            <img src="{{ asset('../../assets//img/icons/misc/pdf.png') }}') }}"
                                                alt="img" width="15" class="me-2" />
                                            <span class="h6 mb-0 text-body">invoices.pdf</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-success"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">Client Meeting</h6>
                                        <small class="text-body-secondary">45 min ago</small>
                                    </div>
                                    <p class="mb-2">Project meeting with john @10:15am</p>
                                    <div class="d-flex justify-content-between flex-wrap gap-2 mb-2">
                                        <div class="d-flex flex-wrap align-items-center mb-50">
                                            <div class="avatar avatar-sm me-3">
                                                <img src="{{ asset('../../assets/img/avatars/1.png') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </div>
                                            <div>
                                                <p class="mb-0 small fw-medium">Lester McCarthy (Client)</p>
                                                <small>CEO of ThemeSelection</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item timeline-item-transparent">
                                <span class="timeline-point timeline-point-info"></span>
                                <div class="timeline-event">
                                    <div class="timeline-header mb-3">
                                        <h6 class="mb-0">Create a new project for client</h6>
                                        <small class="text-body-secondary">2 Day Ago</small>
                                    </div>
                                    <p class="mb-2">6 team members in a project</p>
                                    <ul class="list-group list-group-flush">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-top-0 p-0">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <ul
                                                    class="list-unstyled users-list d-flex align-items-center avatar-group m-0 me-2">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Vinnie Mostowy"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('../../assets/img/avatars/1.png') }}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Allen Rieske"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('../../assets/img/avatars/4.png') }}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-bs-placement="top" title="Julee Rossignol"
                                                        class="avatar pull-up">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('../../assets/img/avatars/2.png') }}"
                                                            alt="Avatar" />
                                                    </li>
                                                    <li class="avatar">
                                                        <span class="avatar-initial rounded-circle pull-up text-heading"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="3 more">+3</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ Activity Timeline -->
                <div class="row">
                    <!-- Connections -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-6">
                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">Connections</h5>
                                <div class="card-action-element">
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow p-0 text-body-secondary"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-base bx bx-dots-vertical-rounded icon-md text-body-secondary"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share connections</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('../../assets/img/avatars/2.png') }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </div>
                                                <div class="me-2">
                                                    <h6 class="mb-0">Cecilia Payne</h6>
                                                    <small>45 Connections</small>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary btn-icon"><i
                                                        class="icon-base bx bx-user-check icon-md"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('../../assets/img/avatars/3.png') }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </div>
                                                <div class="me-2">
                                                    <h6 class="mb-0">Curtis Fletcher</h6>
                                                    <small>1.32k Connections</small>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-primary btn-icon"><i
                                                        class="icon-base bx bx-user-x icon-md"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('../../assets/img/avatars/10.png') }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </div>
                                                <div class="me-2">
                                                    <h6 class="mb-0">Alice Stone</h6>
                                                    <small>125 Connections</small>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-primary btn-icon"><i
                                                        class="icon-base bx bx-user-x icon-md"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-4">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('../../assets/img/avatars/7.png') }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </div>
                                                <div class="me-2">
                                                    <h6 class="mb-0">Darrell Barnes</h6>
                                                    <small>456 Connections</small>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary btn-icon"><i
                                                        class="icon-base bx bx-user-check icon-md"></i></button>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mb-6">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-2">
                                                    <img src="{{ asset('../../assets/img/avatars/12.png') }}"
                                                        alt="Avatar" class="rounded-circle" />
                                                </div>
                                                <div class="me-2">
                                                    <h6 class="mb-0">Eugenia Moore</h6>
                                                    <small>1.2k Connections</small>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-label-primary btn-icon"><i
                                                        class="icon-base bx bx-user-check icon-md"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="text-center">
                                        <a href="javascript:;">View all connections</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Connections -->
                    <!-- Teams -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card card-action mb-6">
                            <div class="card-header align-items-center">
                                <h5 class="card-action-title mb-0">Teams</h5>
                                <div class="card-action-element">
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-icon btn-text-secondary dropdown-toggle hide-arrow p-0"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="icon-base bx bx-dots-vertical-rounded icon-md text-body-secondary"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share teams</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Suggest edits</a></li>
                                            <li>
                                                <hr class="dropdown-divider" />
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Report bug</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0 my-team">
                                    @foreach ($teamsWithUserCounts as $value)
                                        <li class="mb-4">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar me-2">
                                                        <img src="{{ asset('../../assets/img/icons/brands/react-label.png') }}"
                                                            alt="Avatar" class="rounded-circle" />
                                                    </div>
                                                    <div class="me-2">
                                                        <h6 class="mb-0">{{ $value['team']->name }}</h6>
                                                        <small>{{ $value['userCount'] }} Members</small>
                                                    </div>
                                                </div>
                                                <div class="ms-auto">
                                                    {{-- @foreach ($value['team']->tags as $tag) --}}
                                                    <a href="javascript:;"><span
                                                        class="badge bg-label-danger">{{ $value['firstTag']->name }}</span></a>
                                                    {{-- @endforeach --}}
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                    <li class="text-center my-teams">
                                        <a href="javascript:;">View all teams</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--/ Teams -->
                </div>
                <!-- Projects table -->

                <!--/ Projects table -->
            </div>
        </div>
        <!--/ User Profile Content -->

    </div>
    <!-- / Content -->
@endsection
