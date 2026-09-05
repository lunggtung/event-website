/**
 * UI Scripts & Back to Top
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
});
