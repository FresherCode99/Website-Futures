@extends('layouts.app')
@section('title', 'Account Setting')
@section('mainn')
    <div class="flex-grow-1 container-p-y container-fluid">
        @php
        $user = Auth::user();
        @endphp

        <div id="chat-box">
            @foreach($messages as $message)
                <div class="message">
                    <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}
                </div>
            @endforeach
        </div>
    
        <form id="sendMessageForm" method="post" action="{{ route('messages.send', ['receiverId' => $receiverId]) }}">
            @csrf
            <textarea name="message" id="message" placeholder="Nhập tin nhắn..."></textarea>
            <button type="submit">Gửi</button>
        </form>
    
        <script>
            // Đảm bảo receiverId được sử dụng trong JS
            var receiverId = @json($receiverId);
    
            // Kết nối với kênh chat của người nhận
            Echo.channel('chat.' + receiverId)
                .listen('MessageSent', (event) => {
                    // Hiển thị tin nhắn mới
                    console.log('Tin nhắn mới:', event.message);
                    // Cập nhật giao diện với tin nhắn mới
                });
        </script>

    
@endsection
