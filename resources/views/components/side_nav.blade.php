<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @role(['admin', 'telemarketing'])
            <li class="nav-title">
                Sales
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('leads') }}"><i class="icon-people"></i> Leads</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('assessments') }}"><i class="fa fa-check-square-o"></i> Assessments</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('saps') }}"><i class="fa fa-calculator"></i> SAPs</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('orders') }}"><i class="fa fa-money"></i> Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('surveys') }}"><i class="fa fa-list-ol"></i> Surveys</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('installations') }}"><i class="fa fa-wrench"></i> Installations</a>
            </li>
            @endrole

            @role('admin')
            <li class="nav-title">
                System
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/settings') }}"><i class="icon-settings"></i> Settings</a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user"></i> Accounts</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users') }}"> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users/roles') }}"> Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('users/teams') }}"> Teams</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logs') }}"><i class="icon-info"></i> Logs</a>
            </li>
            @endrole

            <li class="nav-title">
                Other
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/links') }}"><i class="icon-link"></i> Links</a>
            </li>

        </ul>
    </nav>
</div>