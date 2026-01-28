<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blog.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.methodologies.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Our Methodology</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.project-management-consultants.edit') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project Mgmt Consultants</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.methodologies.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Our Methodology</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.project-management-consultant-projects.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PMC Projects</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.realtors.edit') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Realtors</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
