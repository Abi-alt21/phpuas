const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');
const closeButton = document.getElementById('close-sidebar');

menuToggle.addEventListener('click', () => {
sidebar.classList.add('show');
});

closeButton.addEventListener('click', () => {
sidebar.classList.remove('show');
});

