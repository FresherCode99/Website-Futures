/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */



import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    wsHost: import.meta.env.VITE_PUSHER_HOST ?? '127.0.0.1',
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 6001,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 6001,
    forceTLS: false,  // Đổi từ true thành false
    enabledTransports: ['ws', 'wss'],
});
console.log("✅ Echo đã khởi tạo:", window.Echo);
let userId = document.querySelector('meta[name="user-id"]').content;
let userIMG= document.querySelector('meta[name="user-img"]').content;
// console.log("ÚID",userId);
window.Echo.private(`chat.${userId}`)
    .listen(".MessageSent", (e) => {
        console.log("Tin nhắn mới:", e.message);

        let chatBox = document.getElementById("list-unstyled chat-history");
        if (chatBox) {
            // chatBox.innerHTML += `<div class="message">
            //     <strong>${e.message.sender_id}</strong>: ${e.message.message}
            // </div>`;
            chatBox.innerHTML += `<li class="chat-message">
                                            <div class="d-flex overflow-hidden">
                                                <div class="user-avatar flex-shrink-0 me-4">
                                                    <div class="avatar avatar-sm">
                                                        <img src="../../storage/${userIMG}" alt="Avatar" class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="chat-message-wrapper flex-grow-1">
                                                    <div class="chat-message-text">
                                                        <p class="mb-0">${e.message.message} </p>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>`;
        }
    });

console.log("Đã đăng ký lắng nghe kênh chat.");

// Kiểm tra xem Echo có hoạt động không
setTimeout(() => {
    console.log("Echo instance:", window.Echo);
}, 5000);


