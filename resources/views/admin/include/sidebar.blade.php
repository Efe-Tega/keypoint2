<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('admin.index') }}" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{ route('view.users') }}" class=" waves-effect">
                <i class="ri-team-line"></i>
                <span>User Management</span>
            </a>
        </li>

        {{-- <li>
            <a href="" class=" waves-effect">
                <i class="ri-file-list-line"></i>
                <span>Plan Management</span>
            </a>
        </li> --}}

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-film-line"></i>
                <span>Task Management</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('view.task') }}">All Task</a></li>
                <li><a href="{{ route('add.task') }}">Add Task</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-funds-line"></i>
                <span>Transactions</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('deposit.transactions') }}">Deposit</a></li>
                <li><a href="{{ route('withdraw.transaction') }}">Withdraw</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('view.level') }}" class=" waves-effect">
                <i class="ri-vip-line"></i>
                <span>Level Management</span>
            </a>
        </li>

        <li>
            <a href="{{ route('view.message') }}" class=" waves-effect">
                <i class="ri-mail-send-line"></i>
                <span>Message Notifications</span>
            </a>
        </li>

        <li>
            <a href="{{ route('settings') }}" class=" waves-effect">
                <i class="ri-settings-2-line"></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>
