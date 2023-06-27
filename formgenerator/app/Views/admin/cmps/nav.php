<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        $request = service('request');
        ?>
        <li class="nav-item">
            <a href="/" class="nav-link <?= ($request->uri->getSegment(1) == '' || $request->uri->getSegment(1) == 'template') ? 'active' : null; ?>">
                <i class="nav-icon fas fa-duotone fa-passport"></i>
                <p>Templates</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/users" class="nav-link <?= $request->uri->getSegment(1) == 'users' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
    </ul>
</nav>
