<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

           @admin
            <li class="@if (\Request::is('profile')) active @endif">
                <a href="/profile"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>



            <li class="@if (\Request::is('showcases')) active @endif">
                <a href="/showcases"><i class="menu-icon ti-layers"></i>Showcases</a>
            </li>

            <li  class="@if (\Request::is('projects')) active @endif">
                <a href="/projects">
                    <i class="menu-icon fa  fa-gavel"></i>
                    Projects
                </a>
            </li>

                        <li  class="@if (\Request::is('create-project')) active @endif ">

                            <a href="/create-project">
                                <i class="menu-icon fa  fa-plus "></i>
                                Create Project</a>
                        </li>



                <li class="@if (\Request::is('engineers')) active @endif">
                    <a href="/engineers" >
                        <i class="menu-icon fa fa-cogs"></i>
                        Engineers
                    </a>

                </li>

                <li class="@if (\Request::is('contractors')) active @endif">
                    <a href="/contractors" class="">
                        <i class="menu-icon fa  fa-wrench"></i>
                        Contractors
                    </a>
                </li>

            <li class="@if (\Request::is('applications')) active @endif">
                <a href="/applications" class="">
                    <i class="menu-icon ti-hand-stop"></i>
                    Applications
                </a>
            </li>

            <li class="@if (\Request::is('complains')) active @endif">
                <a href="/view-complains" class="">
                    <i class="menu-icon ti-face-sad"></i>
                    Complains
                </a>
            </li>

            <li class="@if (\Request::is('messages')) active @endif">
                <a href="/messages" class="">
                    <i class="menu-icon ti-email"></i>
                    Direct Messages
                </a>
            </li>

            @endadmin



            @engineer
                <li class="@if (\Request::is('profile')) active @endif">
                    <a href="/profile"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="@if (\Request::is('find-projects')) active @endif">
                    <a href="/engineer-projects" >
                        <i class="menu-icon fa fa-gavel"></i>
                        Find Projects
                    </a>
                </li>

                <li class="@if (\Request::is('applied-projects')) active @endif">
                    <a href="/applied-projects" >
                        <i class="menu-icon ti-link"></i>
                        Applied Projects
                    </a>
                </li>
                <li class="@if (\Request::is('completed-projects')) active @endif">
                    <a href="/completed-projects" >
                        <i class="menu-icon ti-medall"></i>
                        Completed Projects
                    </a>
                </li>
            @endengineer



            @contractor
                <li class="@if (\Request::is('profile')) active @endif">
                    <a href="/profile"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="@if (\Request::is('find-projects')) active @endif">
                    <a href="/contactor-projects" >
                        <i class="menu-icon fa fa-gavel"></i>
                        Find Projects
                    </a>
                </li>

                <li class="@if (\Request::is('applied-projects')) active @endif">
                    <a href="/applied-projects" >
                        <i class="menu-icon  ti-link"></i>
                        Applied Projects
                    </a>
                </li>
                <li class="@if (\Request::is('completed-projects')) active @endif">
                    <a href="/completed-projects" >
                        <i class="menu-icon ti-medall"></i>
                        Completed Projects
                    </a>
                </li>
            @endcontractor

            @roaduser
            <li  class="@if (\Request::is('allprojects')) active @endif">
                <a href="/allprojects">
                    <i class="menu-icon fa  fa-gavel"></i>
                    Projects
                </a>
            </li>
                <li class="@if (\Request::is('complains')) active @endif">
                    <a href="/complains" >
                        <i class="menu-icon ti-wand"></i>
                        Report
                    </a>
                </li>
            @endroaduser
{{--            //general--}}
            <hr>
            <hr>
          <li class="class="@if (\Request::is('profile')) active @endif"">
              <a  href="/profile">
                  <i class="menu-icon fa fa-user"></i>
                    My Profile
              </a>
          </li>

            <li>
                <a  href="/logout"    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    <i class="menu-icon fa fa-power-off"></i>Logout</a>
            </li>

            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                @csrf
            </form>

        </ul>
    </div>
</nav>
