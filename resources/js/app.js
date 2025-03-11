import './bootstrap';
let userId = document.querySelector('meta[name="user-id"]')?.content;
console.log("User ID:", userId);

if (!userId) {
    console.error("Lỗi: Không tìm thấy user ID!");
} else {
    window.Echo.private(`chat.${userId}`)
        .listen('MessageSent', (e) => {
            console.log("💬 Tin nhắn mới nhận được:", e.content);
            alert(`Bạn có tin nhắn mới từ ${e.sender_id}: ${e.content}`);
        });
}