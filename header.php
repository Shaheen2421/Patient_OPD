
    <div class='menu collapsed-nav'>
        <button type="button" id="toggleNav"><i class="fas fa-bars"></i></button>
        <ul>
            <li><a href='home.php'><i class="fas fa-home"></i> <span>Home</span></a></li>
            <li><a href='patients_list.php'><i class="fas fa-list"></i> <span>Patients List</span></a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
    </div>

    <script>
        $("#toggleNav").on("click", function() {
            $(".menu").toggleClass("collapsed-nav");
            $(".header").toggleClass("sidenavbar");
            $("#pageWidth").toggleClass("wider-page");
        })
    </script>