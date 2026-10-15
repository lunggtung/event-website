/**
 * UI Scripts & Tương tác giao diện người dùng
 * Dự án: Hội nghị Khoa học & Công nghệ Mở 2026
 *
 * @package Event_Child_Theme
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. TỰ ĐỘNG TẠO NÚT BACK-TO-TOP NẾU CHƯA CÓ TRONG DOM
    let backToTopBtn = document.getElementById('ots-back-to-top');

    if (!backToTopBtn) {
        backToTopBtn = document.createElement('button');
        backToTopBtn.id = 'ots-back-to-top';
        backToTopBtn.setAttribute('aria-label', 'Cuộn lên đầu trang');
        backToTopBtn.innerHTML = '&#8679;'; // Ký tự mũi tên lên
        document.body.appendChild(backToTopBtn);
    }

    // 2. LẮNG NGHE SỰ KIỆN CUỘN TRANG (HIỂN THỊ KHI CUỘN QUÁ 300PX)
    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('visible');
        } else {
            backToTopBtn.classList.remove('visible');
        }
    });

    // 3. XỬ LÝ CUỘN MƯỢT LÊN ĐẦU TRANG KHI BẤM NÚT
    backToTopBtn.addEventListener('click', function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // 4. XỬ LÝ CUỘN MƯỢT CHO CÁC LIÊN KẾT ANCHOR (#) NỘI BỘ
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // 5. XỬ LÝ CHUYỂN TAB NGÀY TRONG TRANG LỊCH TRÌNH
    const scheduleTabs = document.querySelectorAll('.event-tab-btn');
    if (scheduleTabs.length > 0) {
        scheduleTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                const targetDay = this.getAttribute('data-day');

                // Bỏ trạng thái active của các tabs khác
                scheduleTabs.forEach(function (t) { t.classList.remove('active'); });
                this.classList.add('active');

                // Ẩn/hiện nội dung panel tương ứng
                const allPanels = document.querySelectorAll('.event-schedule-day-panel');
                allPanels.forEach(function (panel) {
                    panel.style.display = 'none';
                    panel.classList.remove('active');
                });

                const activePanel = document.getElementById(targetDay);
                if (activePanel) {
                    activePanel.style.display = 'block';
                    activePanel.classList.add('active');
                }
            });
        });
    }

    // 6. XỬ LÝ BỘ LỌC CHỦ ĐỀ TRANG DIỄN GIẢ
    const filterButtons = document.querySelectorAll('.filter-btn');
    const speakerCards = document.querySelectorAll('.event-speaker-card');

    if (filterButtons.length > 0 && speakerCards.length > 0) {
        filterButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');

                filterButtons.forEach(function (b) { b.classList.remove('active'); });
                this.classList.add('active');

                speakerCards.forEach(function (card) {
                    const category = card.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});
