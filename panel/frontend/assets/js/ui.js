// panel/assets/js/ui.js
document.addEventListener('click', (e) => {
  const tabBtn = e.target.closest('.tab');
  if (tabBtn && tabBtn.parentElement.dataset.tabs) {
    const group = tabBtn.parentElement.dataset.tabs;
    const tabName = tabBtn.dataset.tab;

    // دکمه‌های تب
    const allTabs = tabBtn.parentElement.querySelectorAll('.tab');
    allTabs.forEach(t => t.classList.remove('is-active'));
    tabBtn.classList.add('is-active');

    // محتوا
    const container = tabBtn.closest('.card');
    const panels = container.querySelectorAll('.tab-content');
    panels.forEach(p => {
      if (p.dataset.tabPanel === tabName) p.classList.add('is-active');
      else p.classList.remove('is-active');
    });
  }
});
