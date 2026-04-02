<nav id="navbar" class="navbar">
    <button onclick="toggleSidebar()">☰</button>
    <h3>My Dashboard</h3>
    <div>User</div>
</nav>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const navbar = document.getElementById('navbar');
        const main = document.getElementById('main');
        const footer = document.getElementById('footer');

        sidebar.classList.toggle('closed');
        navbar.classList.toggle('full');
        footer.classList.toggle('full');
        main.classList.toggle('full');
    }
</script>
