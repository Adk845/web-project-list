//javascript untuk sidebar menu===============

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    
    sidebar.classList.add('sidebar-collapsed');
    mainContent.classList.add('main-content-expanded');
    
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-collapsed');
        mainContent.classList.toggle('main-content-expanded');
    });
});

//==============================================

