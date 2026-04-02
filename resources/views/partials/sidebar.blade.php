<aside id="sidebar" class="sidebar">

    <h2 style="padding:15px;">LOGO</h2>

    <ul style="list-style:none; padding:0;">

        <li style="padding:10px;">
            <a href="/" style="color:white;">Home</a>
        </li>

        <!-- Dashboard collapse -->
        <li style="padding:10px; cursor:pointer;" onclick="toggleMenu('dashMenu')">
            Dashboard ▼
        </li>
        <ul id="dashMenu" class="submenu">
            <li><a href="#" style="color:white;">Analytics</a></li>
            <li><a href="#" style="color:white;">Reports</a></li>
        </ul>

        <!-- Settings collapse -->
        <li style="padding:10px; cursor:pointer;" onclick="toggleMenu('settingsMenu')">
            Settings ▼
        </li>
        <ul id="settingsMenu" class="submenu">
            <li><a href="#" style="color:white;">Profile</a></li>
            <li><a href="#" style="color:white;">Security</a></li>
        </ul>

    </ul>

</aside>

<script>
    function toggleMenu(id) {
        document.getElementById(id).classList.toggle('open');
    }

    function handleResize() {
        const sidebar = document.getElementById('sidebar');

        if (window.innerWidth <= 768) {
            sidebar.classList.add('closed');
            console.log(sidebar.classList);

        } else {
            sidebar.classList.remove('closed');
            console.log(sidebar.classList);

        }
    }

    handleResize();

    window.addEventListener('resize', handleResize);
</script>
