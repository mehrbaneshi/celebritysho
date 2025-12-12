// panel/assets/js/main.js
async function loadComponent(id, path) {
  const el = document.getElementById(id);
  if (!el) return;
  const res = await fetch(path);
  const html = await res.text();
  el.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', async () => {
  await loadComponent('sidebar-container', 'components/sidebar.html');
  await loadComponent('header-container', 'components/header.html');

  // مقدار دمو برای موجودی
  const balanceEl = document.getElementById('header-balance');
  if (balanceEl) {
    balanceEl.textContent = '0';
  }

  // شروع روتینگ
  Router.init('dashboard');
});