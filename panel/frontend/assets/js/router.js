// panel/assets/js/router.js
const routes = {
  'dashboard': 'pages/dashboard.html',
  'create-ad-step1': 'pages/create-ad-step1.html',
  'create-ad-step2': 'pages/create-ad-step2.html',
  'create-ad-step3': 'pages/create-ad-step3.html',
  'create-ad-step4': 'pages/create-ad-step4.html',
  'financial': 'pages/financial.html',
  'wallet': 'pages/wallet.html',
  'support': 'pages/support.html',
  'profile': 'pages/profile.html',
  'campaigns': 'pages/dashboard.html' // فعلاً دمو
};

async function loadPage(route) {
  const container = document.getElementById('app-content');
  const headerTitle = document.getElementById('header-page-title');

  const path = routes[route] || routes['dashboard'];
  try {
    const res = await fetch(path);
    const html = await res.text();
    container.innerHTML = html;

    // به صورت ساده عنوان را عوض کن
    const titles = {
      'dashboard': 'پیشخان',
      'create-ad-step1': 'ساخت تبلیغ - مرحله ۱',
      'create-ad-step2': 'ساخت تبلیغ - مرحله ۲',
      'create-ad-step3': 'ساخت تبلیغ - مرحله ۳',
      'create-ad-step4': 'ساخت تبلیغ - مرحله ۴',
      'financial': 'بخش مالی',
      'wallet': 'گردش حساب و برداشت',
      'support': 'پشتیبانی و تیکت‌ها',
      'profile': 'پروفایل کاربری',
      'campaigns': 'تبلیغ‌ها'
    };
    if (headerTitle) {
      headerTitle.textContent = titles[route] || 'پیشخان';
    }

  } catch (err) {
    container.innerHTML = '<p>خطا در بارگذاری صفحه.</p>';
  }
}

function setActiveSidebar(route) {
  const items = document.querySelectorAll('.sidebar-item');
  items.forEach(btn => {
    const r = btn.getAttribute('data-route');
    if (r === route) btn.classList.add('is-active');
    else btn.classList.remove('is-active');
  });
}

const Router = {
  init(defaultRoute = 'dashboard') {
    // کلیک روی آیتم‌های سایدبار
    document.addEventListener('click', (e) => {
      const target = e.target.closest('[data-route]');
      if (target) {
        const route = target.getAttribute('data-route');
        setActiveSidebar(route);
        loadPage(route);
      }
    });

    // load اولیه
    setActiveSidebar(defaultRoute);
    loadPage(defaultRoute);
  }
};
