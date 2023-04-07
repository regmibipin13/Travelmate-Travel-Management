<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('slider_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.sliders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sliders") || request()->is("admin/sliders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-file-image c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('destination_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.destinations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/destinations") || request()->is("admin/destinations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-globe-asia c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.destination.title') }}
                </a>
            </li>
        @endcan
        @can('blog_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/post-categories*") ? "c-show" : "" }} {{ request()->is("admin/tags*") ? "c-show" : "" }} {{ request()->is("admin/posts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fab fa-blogger c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.blogManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('post_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.post-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/post-categories") || request()->is("admin/post-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-arrow-alt-circle-up c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.postCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tags") || request()->is("admin/tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tags c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('post_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.posts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/posts") || request()->is("admin/posts/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.post.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('packages_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/package-types*") ? "c-show" : "" }} {{ request()->is("admin/packages*") ? "c-show" : "" }} {{ request()->is("admin/package-plans*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-box c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.packagesManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('package_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.package-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/package-types") || request()->is("admin/package-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.packageType.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('package_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.packages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/packages") || request()->is("admin/packages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-fingerprint c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.package.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('package_plan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.package-plans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/package-plans") || request()->is("admin/package-plans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-plane-departure c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.packagePlan.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('booking_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.bookings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bookings") || request()->is("admin/bookings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.booking.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>