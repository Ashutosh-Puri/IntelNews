<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->

        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>

                    <a href="{{ route('admin.dashboard') }}">

                        <i class="mdi mdi-view-dashboard-outline"></i>

                        <span> Dashboard </span>

                    </a>

                </li>

                @if (Auth::user()->status == 'active')
                    <li class="menu-title mt-2">Menu</li>

                    {{-- can()  laravel spattie --}}

                    {{-- @if (Auth::user()->can('category.menu')) --}}

                    <li>

                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">

                            <i class="fa fa-th-list"></i>

                            <span> Category </span>

                            <span class="menu-arrow"></span>

                        </a>

                        <div class="collapse" id="sidebarEcommerce">

                            <ul class="nav-second-level">

                                {{-- @if (Auth::user()->can('category.list')) --}}

                                <li>

                                    <a href="{{ route('all.category') }}">All Category </a>

                                </li>

                                {{-- @endif --}}

                                {{-- @if (Auth::user()->can('category.add')) --}}

                                <li>

                                    <a href="{{ route('add.category') }}">Add Category </a>

                                </li>

                                {{-- @endif --}}

                            </ul>

                        </div>

                    </li>

                    {{-- @endif --}}

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

                    {{-- <li>

                        <a href="#sitesetting" data-bs-toggle="collapse">
                            <i class="fe-settings"></i>
                            <span> Site Setting </span>
                            <span class="menu-arrow"></span>
                        </a>

                        <div class="collapse" id="sitesetting">

                            <ul class="nav-second-level">

                                <li>
                                    <a href="">Update SEO</a>
                                </li>
                                <li>
                                    <a href="">Update SEO</a>
                                </li>

                            </ul>

                        </div>

                    </li> --}}

                    <li class="menu-title mt-2">Setting</li>

                    <li>

                        <a href="#adminsetting" data-bs-toggle="collapse">

                            <i class="fas fa-user-shield"></i>

                            <span> Setting Admin </span>

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
                    <li>

                        <a href="#usersetting" data-bs-toggle="collapse">

                            <i class="fas fa-user-circle"></i>

                            <span> Setting User </span>

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

                    {{-- <li class="menu-title mt-2">Components</li>

                <li>

                    <a href="#sidebarIcons" data-bs-toggle="collapse">

                        <i class="mdi mdi-bullseye"></i>

                        <span> Icons </span>

                        <span class="menu-arrow"></span>

                    </a>

                    <div class="collapse" id="sidebarIcons">

                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-material-symbols.html">Material Symbols Icons</a>
                            </li>
                            <li>
                                <a href="icons-two-tone.html">Two Tone Icons</a>
                            </li>
                            <li>
                                <a href="icons-feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="icons-dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="icons-font-awesome.html">Font Awesome 5</a>
                            </li>
                            <li>
                                <a href="icons-themify.html">Themify</a>
                            </li>
                            <li>
                                <a href="icons-simple-line.html">Simple Line</a>
                            </li>
                            <li>
                                <a href="icons-weather.html">Weather</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                            <li>
                                <a href="forms-validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="forms-pickers.html">Pickers</a>
                            </li>
                            <li>
                                <a href="forms-wizard.html">Wizard</a>
                            </li>
                            <li>
                                <a href="forms-masks.html">Masks</a>
                            </li>
                            <li>
                                <a href="forms-quilljs.html">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="forms-file-uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms-x-editable.html">X Editable</a>
                            </li>
                            <li>
                                <a href="forms-image-crop.html">Image Crop</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                @else
                @endif

            </ul>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
