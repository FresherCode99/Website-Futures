@extends('layouts.app')
@section('title', 'Account Setting')
@section('mainn')
    <div class="flex-grow-1 container-p-y container-fluid">
        @php
        $user = Auth::user();
        @endphp
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
                <!-- Sidebar Left -->
                <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                    <div
                        class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-6 pt-12">
                        <div class="avatar avatar-xl avatar-online chat-sidebar-avatar">
                            <img src="{{ asset('../../storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle">
                        </div>
                        <h5 class="mt-4 mb-0">{{ $user->fullname }}</h5>
                        <span>{{ $user->role }}</span>
                        <i class="icon-base bx bx-x icon-lg cursor-pointer close-sidebar" data-bs-toggle="sidebar"
                            data-overlay="" data-target="#app-chat-sidebar-left"></i>
                    </div>
                    <div class="sidebar-body px-6 pb-6 ps ps--active-y">
                        <div class="my-6">
                            <div class="maxLength-wrapper">
                                <label for="chat-sidebar-left-user-about"
                                    class="text-uppercase text-body-secondary mb-1">About</label>
                                <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about maxLength-example"
                                    rows="3" maxlength="120">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</textarea>
                                <small id="textarea-maxlength-info" class="maxLength label-success">100/120</small>
                            </div>
                        </div>
                        <div class="my-6">
                            <p class="text-uppercase text-body-secondary mb-1">Status</p>
                            <div class="d-grid gap-2 pt-2 text-heading ms-2">
                                <div class="form-check form-check-success">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                        id="user-active" checked="">
                                    <label class="form-check-label" for="user-active">Online</label>
                                </div>
                                <div class="form-check form-check-warning">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                        id="user-away">
                                    <label class="form-check-label" for="user-away">Away</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                        id="user-busy">
                                    <label class="form-check-label" for="user-busy">Do not Disturb</label>
                                </div>
                                <div class="form-check form-check-secondary">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                        id="user-offline">
                                    <label class="form-check-label" for="user-offline">Offline</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-6">
                            <p class="text-uppercase text-body-secondary mb-1">Settings</p>
                            <ul class="list-unstyled d-grid gap-4 ms-2 pt-2 text-heading">
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="icon-base bx bx-lock-alt me-1"></i>
                                        <span class="align-middle">Two-step Verification</span>
                                    </div>
                                    <div class="form-check form-switch mb-0 me-1">
                                        <input type="checkbox" class="form-check-input" checked="">
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="icon-base bx bx-bell me-1"></i>
                                        <span class="align-middle">Notification</span>
                                    </div>
                                    <div class="form-check form-switch mb-0 me-1">
                                        <input type="checkbox" class="form-check-input">
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-base bx bx-user me-1"></i>
                                    <span class="align-middle">Invite Friends</span>
                                </li>
                                <li>
                                    <i class="icon-base bx bx-trash me-1"></i>
                                    <span class="align-middle">Delete Account</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-6">
                            <button class="btn btn-primary w-100" data-bs-toggle="sidebar" data-overlay=""
                                data-target="#app-chat-sidebar-left"><i
                                    class="icon-base bx bx-log-out icon-sm me-2"></i>Logout</button>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 218px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 78px;"></div>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Left-->

                <!-- Chat & Contacts -->
                <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                    id="app-chat-contacts">
                    <div class="sidebar-header px-6 border-bottom d-flex align-items-center">
                        <div class="d-flex align-items-center me-6 me-lg-0">
                            <div class="flex-shrink-0 avatar avatar-online me-4" data-bs-toggle="sidebar"
                                data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                                <img class="user-avatar rounded-circle cursor-pointer"
                                    src="{{ asset('../../storage/' . $user->avatar) }}" alt="Avatar">
                            </div>
                            <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                                <span class="input-group-text" id="basic-addon-search31"><i
                                        class="icon-base bx bx-search icon-sm"></i></span>
                                <input type="text" class="form-control chat-search-input" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="basic-addon-search31">
                            </div>
                        </div>
                        <i class="icon-base bx bx-x icon-lg cursor-pointer position-absolute top-50 end-0 translate-middle d-lg-none d-block"
                            data-overlay="" data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                    </div>
                    <div class="sidebar-body ps ps--active-y">
                        <!-- Chats -->
                        <ul class="list-unstyled chat-contact-list py-2 mb-0" id="chat-list">
                            <li class="chat-contact-list-item chat-contact-list-item-title mt-0 custom-cursor-on-hover">
                                <h5 class="text-primary mb-0">Chats</h5>
                            </li>
                            <li class="chat-contact-list-item chat-list-item-0 d-none">
                                <h6 class="text-body-secondary mb-0">No Chats Found</h6>
                            </li>
                            {{-- @foreach ($fri as $fri) --}}

                            @foreach($frr as $frr)
                            <li class="chat-contact-list-item mb-1 custom-cursor-on-hover {{request()->is("*/" . $frr->username) ? "active" : ""}}"  >
                                <a class="d-flex align-items-center chat-link" href="{{route('chat.show',$frr->username)}}"
                                    data-id="{{ $frr->id }}" {{ $frr->name }}>
                                    <div class="flex-shrink-0 avatar avatar-online">
                                        <img src="{{asset('../../storage/'.$frr->avatar)}}" alt="Avatar" class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="chat-contact-name text-truncate m-0 fw-normal">
                                                {{ $frr->fullname }}</h6>
                                            <small class="chat-contact-list-item-time">5 Minutes</small>
                                        </div>

                                        {{-- @if($friend->lastMessage)
                                        @if($friend->lastMessage->sender_id === auth()->id())
                                        <small class="chat-contact-status text-truncate"> You:{{ $fri->lastMessage->message }}</small>
                                        @else
                                        <small class="chat-contact-status text-truncate"> {{ $fri->lastMessage->message }}</small>
                                        @endif
                                        @else
                                            Chưa có tin nhắn
                                        @endif --}}
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 44px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 1px;"></div>
                        </div>
                    </div>
                </div>
                <!-- /Chat contacts -->

                {{-- <!-- Chat conversation -->
                <div class="col app-chat-conversation d-flex align-items-center justify-content-center flex-column d-none"
                    id="app-chat-conversation">
                    <div class="bg-label-primary p-8 rounded-circle">
                        <i class="icon-base bx bx-message-alt-detail icon-48px"></i>
                    </div>
                    <p class="my-4">Select a contact to start a conversation.</p>
                    <button class="btn btn-primary app-chat-conversation-btn" id="app-chat-conversation-btn">Select
                        Contact</button>
                </div>
                <!-- /Chat conversation --> --}}

                <!-- Chat History -->

                <div class="col app-chat-history" id="app-chat-history" data-id="{{ $frr->id }}">
                    <div class="chat-history-wrapper">
                        <div class="chat-history-header border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex overflow-hidden align-items-center">
                                    <i class="icon-base bx bx-menu icon-lg cursor-pointer d-lg-none d-block me-4"
                                        data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                                    <div class="flex-shrink-0 avatar avatar-online">
                                        <img src="{{asset('../../storage/'.$fri->avatar)}}" alt="Avatar" class="rounded-circle"
                                            data-bs-toggle="sidebar" data-overlay=""
                                            data-target="#app-chat-sidebar-right">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-4">
                                        <h6 class="m-0 fw-normal">{{ $fri->fullname }}</h6>
                                        <small class="user-status text-body">{{$fri->topic}}</small>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span
                                        class="btn btn-text-secondary text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                                        <i class="icon-base bx bx-phone icon-md"></i>
                                    </span>
                                    <span
                                        class="btn btn-text-secondary text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                                        <i class="icon-base bx bx-video icon-md"></i>
                                    </span>
                                    <span
                                        class="btn btn-text-secondary text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                                        <i class="icon-base bx bx-search icon-md"></i>
                                    </span>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-icon btn-text-secondary text-secondary rounded-pill dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown" aria-expanded="true" id="chat-header-actions"><i
                                                class="icon-base bx bx-dots-vertical-rounded icon-md"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="chat-header-actions">
                                            <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  id="chat-history-body"  class="chat-history-body ps " data-id="{{ $fri->id }}">
                            <ul class="list-unstyled chat-history" id="list-unstyled chat-history">
                              
                                @foreach ($messages as $key =>$message)
                                @php
                                // Lấy tin nhắn trước đó (nếu có)
                                $previousMessage = isset($messages[$key - 1]) ? $messages[$key - 1] : null;
                        
                                // Lưu ID của người gửi tin nhắn trước đó
                                $lastSenderId = $previousMessage ? $previousMessage->sender_id : null;
                            @endphp
                                    @if ($message->sender->id == auth()->id())
                                        <li class="chat-message chat-message-right">
                                            <div class="d-flex overflow-hidden">
                                               

                                                <div class="chat-message-wrapper flex-grow-1">
                                                    <div class="chat-message-text">
                                                        <p class="mb-0">{{ $message->message }}</p>
                                                    </div>
                                                    {{-- <div class="text-end text-body-secondary mt-1">
                                                        <i
                                                            class="icon-base bx bx-check-double icon-16px text-success me-1"></i>
                                                        <small>10:00 AM</small>
                                                    </div> --}}
                                                </div>
                                                @if($loop->last || $message->created_at->gt($messages->last()->created_at))

                                                <div class="user-avatar flex-shrink-0 ms-4">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{asset('../../storage/'.$frr->avatar)}}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                @else
                                                <div class="user-avatar flex-shrink-0 ms-4">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{asset('../../storage/'.$frr->avatar)}}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </li>
                                    @else
                                        <li class="chat-message">
                                            <div class="d-flex overflow-hidden">
                                                <div class="user-avatar flex-shrink-0 me-4">
                                                    <div class="avatar avatar-sm">
                                                        <img src="{{asset('../../storage/'.$frr->avatar)}}" alt="Avatar"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="chat-message-wrapper flex-grow-1">
                                                    <div class="chat-message-text">
                                                        <p class="mb-0">{{ $message->message }}</p>
                                                        
                                                    </div>
                                                    {{-- <div class="chat-message-text mt-2">
                                                        <p class="mb-0">It should be Bootstrap 5 compatible.</p>
                                                    </div>
                                                    <div class="text-body-secondary mt-1">
                                                        <small>10:02 AM</small>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                    {{-- <div class="message">
                                        <strong>{{ $message->sender->fullname }}:</strong> {{ $message->message }}
                                    </div> --}}
                                @endforeach
                                    {{-- <li></li> --}}


                            </ul>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                        <!-- Chat message form -->
                        <div class="chat-history-footer shadow-xs">
                            <form  action="{{ route('messages.send', $fri->id) }}" method="POST" id="sendMessageForm" class="form-send-message d-flex justify-content-between align-items-center ">
                                @csrf
                                <input name="message" id="message" class="form-control message-input border-0 me-4 shadow-none"
                                    placeholder="Type your message here..." required>
                                    <input type="text" value="{{$fri->id}}" hidden id="receiverId">
                                <div class="message-actions d-flex align-items-center">
                                    <span class="btn btn-text-secondary btn-icon rounded-pill cursor-pointer">
                                        <i class="speech-to-text icon-base bx bx-microphone icon-md text-heading"></i>
                                    </span>
                                    <label for="attach-doc" class="form-label mb-0">
                                        <span class="btn btn-text-secondary btn-icon rounded-pill cursor-pointer mx-1">
                                            <i class="icon-base bx bx-paperclip icon-md text-heading"></i>
                                        </span>
                                        <input type="file" id="attach-doc" hidden="">
                                    </label>
                                    <button class="btn btn-primary d-flex send-msg-btn" type="submit" >
                                        <span class="align-middle d-md-inline-block d-none">Send</span>
                                        <i class="icon-base bx bx-paper-plane icon-sm ms-md-2 ms-0"></i>
                                    </button>
                                </div>
                            </form>

                            {{-- <form action="{{ route('messages.send', $fri->id) }}" method="POST">
                                @csrf
                                <textarea name="message" rows="4" required></textarea>
                                <button type="submit">Send</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <!-- /Chat History -->

                <!-- Sidebar Right -->
                <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                    <div
                        class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-6 pt-12">
                        <div class="avatar avatar-xl avatar-online chat-sidebar-avatar">
                            <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <h5 class="mt-4 mb-0">Felecia Rower</h5>
                        <span>NextJS Developer</span>
                        <i class="icon-base bx bx-x icon-lg cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar"
                            data-overlay="" data-target="#app-chat-sidebar-right"></i>
                    </div>
                    <div class="sidebar-body p-6 pt-0 ps ps--active-y">
                        <div class="my-6">
                            <p class="text-uppercase mb-1 text-body-secondary">About</p>
                            <p class="mb-0">It is a long established fact that a reader will be distracted by the
                                readable content .</p>
                        </div>
                        <div class="my-6">
                            <p class="text-uppercase mb-1 text-body-secondary">Personal Information</p>
                            <ul class="list-unstyled d-grid gap-4 mb-0 ms-2 py-2 text-heading">
                                <li class="d-flex align-items-center">
                                    <i class="icon-base bx bx-envelope"></i>
                                    <span class="align-middle ms-2">josephGreen@email.com</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icon-base bx bx-phone-call"></i>
                                    <span class="align-middle ms-2">+1(123) 456 - 7890</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="icon-base bx bx-time-five"></i>
                                    <span class="align-middle ms-2">Mon - Fri 10AM - 8PM</span>
                                </li>
                            </ul>
                        </div>
                        <div class="my-6">
                            <p class="text-uppercase text-body-secondary mb-1">Options</p>
                            <ul class="list-unstyled d-grid gap-4 ms-2 py-2 text-heading">
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="icon-base bx bx-bookmark"></i>
                                    <span class="align-middle ms-2">Add Tag</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="icon-base bx bx-star"></i>
                                    <span class="align-middle ms-2">Important Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="icon-base bx bx-image-alt"></i>
                                    <span class="align-middle ms-2">Shared Media</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="icon-base bx bx-trash"></i>
                                    <span class="align-middle ms-2">Delete Contact</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="icon-base bx bx-block"></i>
                                    <span class="align-middle ms-2">Block Contact</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-6">
                            <button class="btn btn-danger w-100" data-bs-toggle="sidebar" data-overlay=""
                                data-target="#app-chat-sidebar-right">Delete Contact<i
                                    class="icon-base bx bx-trash icon-sm ms-2"></i></button>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 221px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 83px;"></div>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Right -->

                <div class="app-overlay"></div>
            </div>
        </div>

    </div>
    <script>
        let userId = document.querySelector('meta[name="user-id"]').content;
        Echo.channel('chat.' + userId)
            .listen('MessageSent', (event) => {
                // Cập nhật giao diện với tin nhắn mới
                console.log('Tin nhắn mới:', event.message);
                // Thêm tin nhắn vào danh sách
            });
    </script>

<script src="{{ asset('../../js/app.js') }}"></script>
@endsection
