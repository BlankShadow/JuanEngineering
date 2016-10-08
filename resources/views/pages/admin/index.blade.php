<!DOCTYPE html >
<html lang="en">
    <head>
        @include('plugins.plugins-admin-styles')
    </head>

<body>

         @include('includes.admin-header')

        <aside>
            <div class="sidebar">
                <div class="sidebar-top">
                    <div class="row">
                        <div class="col-md-4">  <img  src="{{ asset('assets/img/2.png')}}" id="profile-pic"></div>
                        <div class="col-md-8" id="profile-info">
                          <label id="welcome">Welcome</label><br>
                          <label id="profile-first-name">John</label> <label id="profile-last-name"> Doe</label><br>
                          <label id="profile-role">Admin</label>
                        </div>
                    </div>
                </div>
                <ul class="nav navbar-nav" id="sidebar-nav">
                  <li  class="active" ><a href="#"  class="active" >Dashboard</a></li>
                  <li><a href="#">Statistics</a></li>
                  <li><a href="#">Users</a></li>
                  <li><a href="#">Reports</a></li>
                </ul>
            </div>
        </aside>
        <section id="main-container">
          hello
        </section>



</body>
</html>
