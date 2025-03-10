@extends('layouts.app')
@section('title', 'Manage Friend')
@section('mainn')

    <!--Content tại đây -->
    <div class="flex-grow-1 container-p-y container-fluid">

        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-6">
                    <div class="user-profile-header-banner">
                        <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-8">
                        <div class="flex-shrink-0 mt-1 mx-sm-0 mx-auto">
                            <img src="{{ asset('../../storage/' . $user->avatar) }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-6 rounded-3 user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-lg-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4 class="mb-2 mt-lg-7">{{$user->fullname}}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 mt-4">
                                        <li class="list-inline-item"><i
                                                class="icon-base bx bx-palette me-2 align-top"></i><span
                                                class="fw-medium">{{$user->topic}}</span></li>
                                        <li class="list-inline-item"><i class="icon-base bx bx-map me-2 align-top"></i><span
                                                class="fw-medium">{{$user->address}}</span></li>
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
                                    class="icon-base bx bx-user icon-sm me-1_5"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('my-team')}}"><i
                                    class="icon-base bx bx-group icon-sm me-1_5"></i> Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="icon-base bx bx-grid-alt icon-sm me-1_5"></i> Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i
                                    class="icon-base bx bx-link-alt icon-sm me-1_5"></i> Connections</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Navbar pills -->

        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header px-0 pt-0">
                    <div class="nav-align-top">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-tab-home" aria-controls="navs-tab-home" aria-selected="true">New
                                    Friend</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                    data-bs-target="#navs-tab-profile" aria-controls="navs-tab-profile"
                                    aria-selected="false" tabindex="-1">Friend Requests
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link" data-bs-toggle="tab" role="tab"
                                    data-bs-target="#navs-tab-ss" aria-controls="navs-tab-ss" aria-selected="false"
                                    tabindex="-1">Your Friends</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane fade active show" id="navs-tab-home" role="tabpanel">
                            <!-- Connection Cards -->
                            <div class="row g-6">
                                @foreach ($users as $us)
                                    @if (
                                        $us->id !== auth()->id() &&
                                            // $us->user_id !== auth()->id() &&
                                            // $us->friend_id !== auth()->id() &&
                                            // $us->status !== "pending" &&
                                            !$us->isFriendWith(auth()->id()) &&
                                            !$us->hasPendingFriendRequest(auth()->id()))
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <div class="dropdown btn-pinned">
                                                        <button type="button"
                                                            class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="icon-base bx bx-dots-vertical-rounded icon-md text-body-secondary"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Share
                                                                    connection</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Block
                                                                    connection</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item text-danger"
                                                                    href="javascript:void(0);">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mx-auto my-6">
                                                        <img src="../../assets/img/avatars/3.png" alt="Avatar Image"
                                                            class="rounded-circle w-px-100 h-px-100">
                                                    </div>
                                                    <h5 class="mb-0 card-title">{{ $us->fullname }}</h5>
                                                    <span>{{ $us->username }}</span>
                                                    <div
                                                        class="d-flex align-items-center justify-content-center my-6 gap-2">
                                                        <a href="javascript:;" class="me-2"><span
                                                                class="badge bg-label-secondary">Figma</span></a>
                                                        <a href="javascript:;"><span
                                                                class="badge bg-label-warning">Sketch</span></a>
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-around mb-8">
                                                        <div>
                                                            <h5 class="mb-0">18</h5>
                                                            <span>Projects</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">834</h5>
                                                            <span>Tasks</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">129</h5>
                                                            <span>Connections</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <form action="{{ route('friend.sendRequest', $us->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-label-primary d-flex align-items-center me-4">
                                                                <i
                                                                    class="icon-base bx bx-user-plus icon-sm me-2"></i>Connect
                                                            </button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--/ Connection Cards -->

                        </div>
                        <div class="tab-pane fade" id="navs-tab-profile" role="tabpanel">
                            <div class="list-group">
                                @foreach ($pendingRequests as $rs)
                                    @if ($us->user_id != auth()->id()  && $rs->user_id  !== Auth::user()->id)
                                        <div
                                            class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer">
                                            <img src="../../assets/img/avatars/2.png" alt="User Image"
                                                class="rounded-circle me-4 w-px-50">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between custom-cursor-on-hover">
                                                    <div class="user-info">
                                                        <h6 class="mb-1">{{ $rs->user->fullname }}</h6>
                                                        {{-- <small>13 minutes</small> --}}
                                                        <div class="user-status custom-cursor-on-hover">
                                                            <span class="badge badge-dot bg-success"></span>
                                                            <small>Online</small>
                                                        </div>
                                                    </div>
                                                    <div class="add-btn">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex justify-content-between">
                                                                <form
                                                                    action="{{ route('friend.acceptRequest', $rs->user_id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button
                                                                        class="btn btn-success btn-sm me-2">Accept</button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('friend.rejectRequest', $rs->user_id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button class="btn btn-danger btn-sm">Reject</button>
                                                                </form>
                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>


                        </div>
                        <div class="tab-pane fade  " id="navs-tab-ss" role="tabpanel">
                            <!-- Connection Cards -->
                            <div class="row g-6">
                                @foreach ($friends as $us)
                                    @if ($us->id != Auth::user()->id)
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <div class="dropdown btn-pinned">
                                                        <button type="button"
                                                            class="btn btn-icon btn-text-secondary rounded-pill dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="icon-base bx bx-dots-vertical-rounded icon-md text-body-secondary"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Share
                                                                    connection</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);">Block
                                                                    connection</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item text-danger"
                                                                    href="javascript:void(0);">Delete</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="mx-auto my-6">
                                                        <img src="../../assets/img/avatars/3.png" alt="Avatar Image"
                                                            class="rounded-circle w-px-100 h-px-100">
                                                    </div>
                                                    <h5 class="mb-0 card-title">{{ $us->fullname }}</h5>
                                                    <span>{{ $us->username }}</span>
                                                    <div
                                                        class="d-flex align-items-center justify-content-center my-6 gap-2">
                                                        <a href="javascript:;" class="me-2"><span
                                                                class="badge bg-label-secondary">Figma</span></a>
                                                        <a href="javascript:;"><span
                                                                class="badge bg-label-warning">Sketch</span></a>
                                                    </div>

                                                    <div class="d-flex align-items-center justify-content-around mb-8">
                                                        <div>
                                                            <h5 class="mb-0">18</h5>
                                                            <span>Projects</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">834</h5>
                                                            <span>Tasks</span>
                                                        </div>
                                                        <div>
                                                            <h5 class="mb-0">129</h5>
                                                            <span>Connections</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <a href="javascript:;"
                                                            class="btn btn-primary d-flex align-items-center me-4"><i
                                                                class="icon-base bx bx-user-check icon-sm me-2"></i>Connected</a>
                                                        <a href="{{route('messages',$us->username)}}"
                                                            class="btn btn-label-secondary btn-icon"><i
                                                                class="icon-base bx bx-envelope icon-md"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--/ Connection Cards -->

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
