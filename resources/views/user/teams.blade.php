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
                            <a class="nav-link" href="{{route('my-profile')}}"><i
                                    class="icon-base bx bx-user me-1_5 icon-sm"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i
                                    class="icon-base bx bx-group me-1_5 icon-sm"></i> Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="icon-base bx bx-grid-alt me-1_5 icon-sm"></i> Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('friend.index')}}"><i
                                    class="icon-base bx bx-link-alt me-1_5 icon-sm"></i> Connections</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->

        <!-- Teams Cards -->
        <div class="row g-6">

            @foreach ($teamsWithEarliestUsers as $item)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <a href="javascript:;" class="d-flex align-items-center">
                                    <div class="avatar me-2">
                                        <img src="{{ asset('../../storage/'.$item['team']->image)}}" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="me-2 text-heading h5 mb-0">{{ $item['team']->name }}</div>
                                </a>
                                <div class="ms-auto">
                                    <ul class="list-inline mb-0 d-flex align-items-center">
                                        <li class="list-inline-item me-0">
                                            <a href="javascript:void(0);"
                                                class="d-flex align-self-center btn btn-icon btn-text-secondary rounded-pill"><i
                                                    class="icon-base bx bx-star icon-md text-body-secondary"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <div class="dropdown">
                                                <button type="button"
                                                    class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow p-0"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="icon-base bx bx-dots-vertical-rounded icon-md text-body-secondary"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">View Details</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0);">Add to
                                                            favorites</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider" />
                                                    </li>
                                                    <li><a class="dropdown-item text-danger"
                                                            href="javascript:void(0);">Delete Team</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="mb-3 pb-1" description>{{ $item['team']->description }}</p>
                            {{-- <p>Number of users in this team: {{ $item['userCount'] }}</p> <!-- Display user count --> --}}

                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach ($item['earliestUsers'] as $earliestUser)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                title="{{ $earliestUser->fullname }}" class="avatar avatar-sm pull-up">
                                                <img class="rounded-circle"
                                                    src="{{ asset('../../storage/' . $earliestUser->avatar) }}"
                                                    alt="Avatar" />
                                            </li>
                                           
                                        @endforeach
                                        @if ($item['userCount'] >=3)
                                        <li class="avatar avatar-sm">
                                            <span class="avatar-initial rounded-circle pull-up" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="{{ $item['userCount'] - 3 }} more"> {{"+".$item['userCount'] - 3 }}</span>
                                        </li>
                                        @endif
                                    



                                    </ul>
                                </div>
                            <div class="ms-auto">
                                @foreach ($item['firstTag'] as $tag)
                                    <span class="badge bg-label-primary">{{ $tag->name }}</span>
                                @endforeach
                            </div>

                                
                            </div>
                        </div>
                    </div>
                    
                </div>
            
            @endforeach

        </div>
        <!--/ Teams Cards -->


    </div>
    <!-- / Content -->
@endsection
