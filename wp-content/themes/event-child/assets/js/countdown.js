/** Countdown values are scoped to each instance. */
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-countdown], .ots-countdown-container').forEach(function (container) {
        const start = Date.parse(container.getAttribute('data-target') || '');
        const end = Date.parse(container.getAttribute('data-end') || '');
        const grid = container.querySelector('[data-countdown-grid]');
        const status = container.querySelector('[data-countdown-status]');
        let timer = null;

        function showStatus(message) {
            if (grid) grid.hidden = true;
            if (status) {
                status.textContent = message;
                status.hidden = false;
            }
        }

        function update() {
            if (!Number.isFinite(start)) {
                showStatus('Thời gian khai mạc đang được cập nhật.');
                return false;
            }
            const now = Date.now();
            const remaining = start - now;
            if (remaining <= 0) {
                showStatus(Number.isFinite(end) && now > end ? 'Hội nghị đã kết thúc. Cảm ơn bạn đã theo dõi.' : 'Hội nghị đang diễn ra. Xem lịch trình để chọn phiên tham dự.');
                return false;
            }
            if (grid) grid.hidden = false;
            if (status) status.hidden = true;
            const values = {
                days: Math.floor(remaining / 86400000),
                hours: Math.floor(remaining / 3600000) % 24,
                minutes: Math.floor(remaining / 60000) % 60,
                seconds: Math.floor(remaining / 1000) % 60
            };
            Object.keys(values).forEach(function (unit) {
                const element = container.querySelector('[data-unit="' + unit + '"]');
                if (element) element.textContent = String(values[unit]).padStart(2, '0');
            });
            return true;
        }
        if (update()) {
            timer = window.setInterval(function () {
                if (!update()) window.clearInterval(timer);
            }, 1000);
        }
    });
});
