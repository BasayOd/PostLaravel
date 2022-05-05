<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Пользователи
                        </p>
                        <div class="mt-1">
                            <a href="{{route('admin.user.create')}}" class="btn btn-block btn-outline-primary">Create</a>
                        </div>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="{{route('admin.tag.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Тэги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.post.index')}}" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Посты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>
                            Категории
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
