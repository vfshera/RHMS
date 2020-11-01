<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">

           @admin
            <li class="@if (\Request::is('home')) active @endif">
                <a href="/home"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle "
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <i class="menu-icon fa  fa-gavel"></i>
                        Projects
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li  class="@if (\Request::is('create-project')) active @endif"><i class="fa  fa-plus "></i>
                            <a href="/create-project">Add</a>
                        </li>
                        <li  class="@if (\Request::is('projects')) active @endif">
                            <i class="ti-eye action-menu">

                            </i><a href="/projects">All</a>
                        </li>

                    </ul>
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
        </ul>
    </div>
</nav>
