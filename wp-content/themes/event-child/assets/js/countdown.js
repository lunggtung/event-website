/**
 * Countdown Timer
 */

document.addEventListener('DOMContentLoaded', function () {
    const countdownContainer = document.querySelector('.ots-countdown-container');
    if (!countdownContainer) {
        return;
    }

    // Lấy mốc thời gian mục tiêu từ thuộc tính data-target (hoặc dùng mặc định: 20/11/2026 08:00:00)
    const targetDateAttr = countdownContainer.getAttribute('data-target') || '2026-11-20T08:00:00';
    const targetTime = new Date(targetDateAttr).getTime();

    const daysEl = document.getElementById('cd-days');
    const hoursEl = document.getElementById('cd-hours');
    const minutesEl = document.getElementById('cd-minutes');
    const secondsEl = document.getElementById('cd-seconds');
    const expiredMsg = document.getElementById('cd-expired-msg');
    const countdownGrid = document.querySelector('.ots-countdown-grid');

    function padZero(num) {
        return num < 10 ? '0' + num : num;
    }

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetTime - now;

        // Nếu đã qua thời gian khai mạc
        if (distance <= 0) {
            clearInterval(timerInterval);
            if (countdownGrid) countdownGrid.style.display = 'none';
            if (expiredMsg) expiredMsg.style.display = 'block';
            return;
        }

        // Tính toán Ngày, Giờ, Phút, Giây
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Cập nhật DOM
        if (daysEl) daysEl.textContent = padZero(days);
        if (hoursEl) hoursEl.textContent = padZero(hours);
        if (minutesEl) minutesEl.textContent = padZero(minutes);
        if (secondsEl) secondsEl.textContent = padZero(seconds);
    }

    // Chạy lần đầu ngay khi nạp trang
    updateCountdown();

    // Thiết lập lặp lại mỗi giây
    const timerInterval = setInterval(updateCountdown, 1000);
});
