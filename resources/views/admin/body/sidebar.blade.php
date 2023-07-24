<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                    <li class="menu-title mt-2">Menu</li>
                    @if (Auth::user()->can('CategoryAccess'))
                        <li>
                            <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                                <i class="fa fa-th-list"></i>
                                <span> Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.category') }}">All Category </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.category') }}">Add Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('SubCategoryAccess'))
                        <li>
                            <a href="#subcategory" data-bs-toggle="collapse">
                                <i class="fas fa-sitemap"></i>
                                <span> Sub Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="subcategory">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.sub.category') }}">All Sub Category </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.sub.category') }}">Add Sub Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('NewsPostAccess'))
                        <li>
                            <a href="#newspost" data-bs-toggle="collapse">
                                <i class="fa fa-newspaper"></i>
                                <span> News Post Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="newspost">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.news.post') }}">All News Post </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.news.post') }}">Add News Post </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('BannerAccess'))
                    <li>
                        <a href="#banner" data-bs-toggle="collapse">
                            <i class="fa fa-bullhorn"></i>
                            <span> Banner Setting </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="banner">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('all.banner') }}">All Banner </a>
                                </li>
                                <li>
                                    <a href="{{ route('add.banner') }}">Add Banner </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->can('PhotoAccess'))
                        <li>
                            <a href="#photoSetting" data-bs-toggle="collapse">
                                <i class="fa fa-camera-retro"></i>
                                <span> Photo Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="photoSetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.photo.gallery') }}">All Photo Gallery</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.photo.gallery') }}">Add Photo Gallery</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('VideoAccess'))
                        <li>
                            <a href="#videoSetting" data-bs-toggle="collapse">
                                <i class="fa fa-video-camera"></i>
                                <span> Video Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="videoSetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.video.gallery') }}">All Video Gallery</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.video.gallery') }}">Add Video Gallery</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('LiveTvAccess'))
                        <li>
                            <a href="#livetvsetting" data-bs-toggle="collapse">
                                <i class="fa fa-bullseye"></i>
                                <span> Live Tv Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="livetvsetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.live.tv') }}">All Live TV</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.live.tv') }}">Add Live TV</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('ReviewAccess'))
                        <li>
                            <a href="#reviewcomment" data-bs-toggle="collapse">
                                <i class="fa fa-file-text"></i>
                                <span> Review Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="reviewcomment">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('pending.review') }}">Pending Review</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('approve.review') }}">Approve Review</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('SeoAccess'))
                        <li>
                            <a href="#seosetting" data-bs-toggle="collapse">
                                <i class="fas fa-stream"></i>
                                <span> SEO Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="seosetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.seo') }}">All SEO</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.seo') }}">Add SEO</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('ContactAccess'))
                        <li>
                            <a href="#contact" data-bs-toggle="collapse">
                                <i class="fas fa-phone"></i>
                                <span> Contacts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="contact">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.contact') }}">All Contact</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.contact') }}">Add Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('SubscriberAccess'))
                        <li>
                            <a href="#subscriber" data-bs-toggle="collapse">
                                <i class="fas fa-users"></i>
                                <span> Subscribers</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="subscriber">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.subscriber') }}">All Subscriber</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.subscriber') }}">Add Subscriber</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('NotificationAccess'))
                    <li>
                        <a href="#notification" data-bs-toggle="collapse">
                            <i class="fas fa-bell"></i>
                            <span> Notifications</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="notification">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('all.notification') }}">All Notification</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                    @if (Auth::user()->can('SiteAccess'))
                        <li>
                            <a href="#sitesetting" data-bs-toggle="collapse">
                                <i class="fe-settings"></i>
                                <span> Site Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sitesetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.site.setting') }}">All Site Setting</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.site.setting') }}">Add Site Setting</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="menu-title mt-2">Setting</li>
                    @if (Auth::user()->can('AdminAccess'))
                        <li>
                            <a href="#adminsetting" data-bs-toggle="collapse">
                                <i class="fas fa-user-shield"></i>
                                <span>Admin  Setting </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="adminsetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.admin') }}">All Admin</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.admin') }}">Add Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::user()->can('UserAccess'))
                        <li>
                            <a href="#usersetting" data-bs-toggle="collapse">
                                <i class="fas fa-user-circle"></i>
                                <span>User Setting  </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="usersetting">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.user') }}">All User</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('add.user') }}">Add User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif 
                    @if (Auth::user()->can('RoleAccess')) 
                        <li>
                            <a href="#roles" data-bs-toggle="collapse">
                                <i class="fas fa-user-lock"></i>
                                <span> Roles And Permission </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="roles">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('all.permission') }}">All Permission</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.roles') }}">All Roles</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('all.roles.permission') }}">All Roles In Permission</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                     @endif
            </ul>
        </div>
    </div>
</div>
