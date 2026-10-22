/** Navigation, schedule and speaker interactions. */
document.addEventListener('DOMContentLoaded', function () {
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const toggle = document.querySelector('[data-nav-toggle]');
    const nav = toggle ? document.getElementById(toggle.getAttribute('aria-controls')) : null;
    function closeMenu(restoreFocus) {
        if (!toggle || !nav) return;
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        if (restoreFocus) toggle.focus();
    }
    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            const open = toggle.getAttribute('aria-expanded') !== 'true';
            toggle.setAttribute('aria-expanded', String(open));
            nav.classList.toggle('is-open', open);
        });
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') closeMenu(true);
        });
        document.addEventListener('click', function (event) {
            if (!nav.contains(event.target) && !toggle.contains(event.target)) closeMenu(false);
        });
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () { closeMenu(false); });
        });
        window.matchMedia('(min-width: 901px)').addEventListener('change', function (event) {
            if (event.matches) closeMenu(false);
        });
    }
    const tabs = Array.from(document.querySelectorAll('[data-day]'));
    const panels = Array.from(document.querySelectorAll('[data-day-panel], .event-schedule-day-panel'));
    function activateDay(tab, moveFocus) {
        const id = tab.getAttribute('data-day');
        if (!document.getElementById(id)) return;
        tabs.forEach(function (item) {
            const active = item === tab;
            item.classList.toggle('active', active);
            item.setAttribute('aria-selected', String(active));
            item.tabIndex = active ? 0 : -1;
        });
        panels.forEach(function (panel) {
            const active = panel.id === id;
            panel.hidden = !active;
            panel.style.display = active ? '' : 'none';
            panel.classList.toggle('active', active);
        });
        if (moveFocus) tab.focus();
    }
    tabs.forEach(function (tab, index) {
        tab.addEventListener('click', function () { activateDay(tab, false); });
        tab.addEventListener('keydown', function (event) {
            let next = index;
            if (event.key === 'ArrowRight') next = (index + 1) % tabs.length;
            else if (event.key === 'ArrowLeft') next = (index - 1 + tabs.length) % tabs.length;
            else if (event.key === 'Home') next = 0;
            else if (event.key === 'End') next = tabs.length - 1;
            else return;
            event.preventDefault();
            activateDay(tabs[next], true);
        });
    });
    if (tabs.length) {
        const linked = window.location.hash && document.getElementById(window.location.hash.slice(1));
        const linkedPanel = linked ? linked.closest('[data-day-panel], .event-schedule-day-panel') : null;
        const initial = tabs.find(function (tab) { return linkedPanel && tab.getAttribute('data-day') === linkedPanel.id; }) || tabs.find(function (tab) { return tab.classList.contains('active'); }) || tabs[0];
        activateDay(initial, false);
        if (linked && linkedPanel) window.requestAnimationFrame(function () { linked.scrollIntoView(); });
    }
    const filters = document.querySelectorAll('[data-filter]');
    const cards = document.querySelectorAll('.event-speaker-card[data-category], .summit-speaker-card[data-category], .summit-speaker-profile[data-category]');
    filters.forEach(function (button) {
        button.addEventListener('click', function () {
            const category = button.getAttribute('data-filter');
            filters.forEach(function (item) {
                const active = item === button;
                item.classList.toggle('active', active);
                item.classList.toggle('is-active', active);
                item.setAttribute('aria-pressed', String(active));
            });
            let visible = 0;
            cards.forEach(function (card) {
                const match = category === 'all' || card.getAttribute('data-category') === category;
                card.hidden = !match;
                if (match) visible += 1;
            });
            const count = document.querySelector('[data-filter-status]');
            if (count) count.textContent = 'Hiển thị ' + visible + ' diễn giả.';
        });
    });
    document.querySelectorAll('[data-room-filter]').forEach(function (button) {
        button.addEventListener('click', function () {
            const room = button.getAttribute('data-room-filter');
            document.querySelectorAll('[data-room-filter]').forEach(function (item) {
                const active = item === button;
                item.classList.toggle('is-active', active);
                item.setAttribute('aria-pressed', String(active));
            });
            document.querySelectorAll('.summit-session[data-room]').forEach(function (session) {
                session.hidden = room !== 'all' && session.getAttribute('data-room') !== room && session.getAttribute('data-room') !== 'common';
            });
        });
    });
    document.querySelectorAll('[data-tier]').forEach(function (button) {
        button.addEventListener('click', function () {
            const tier = document.getElementById('ticket_tier');
            if (tier) {
                tier.value = button.getAttribute('data-tier');
                tier.dispatchEvent(new Event('change', { bubbles: true }));
            }
        });
    });
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            const hash = link.getAttribute('href');
            if (!hash || hash === '#') return;
            let id;
            try { id = decodeURIComponent(hash.slice(1)); } catch (error) { return; }
            const target = document.getElementById(id);
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: reducedMotion ? 'auto' : 'smooth', block: 'start' });
            if (link.classList.contains('summit-skip-link')) target.focus();
            window.history.replaceState(null, '', hash);
        });
    });
    const backToTop = document.createElement('button');
    backToTop.type = 'button';
    backToTop.className = 'summit-back-to-top';
    backToTop.setAttribute('aria-label', 'Về đầu trang');
    backToTop.textContent = '↑';
    backToTop.hidden = true;
    document.body.appendChild(backToTop);
    window.addEventListener('scroll', function () { backToTop.hidden = window.scrollY < 600; }, { passive: true });
    backToTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' }); });
    document.querySelectorAll('.summit-form').forEach(function (form) {
        form.addEventListener('submit', function () {
            if (!form.checkValidity()) return;
            const submit = form.querySelector('[type="submit"]');
            if (submit) {
                submit.disabled = true;
                submit.setAttribute('aria-busy', 'true');
                submit.textContent = 'Đang xử lý đăng ký…';
            }
        });
    });
});
