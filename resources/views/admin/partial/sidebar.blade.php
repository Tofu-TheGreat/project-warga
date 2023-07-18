<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/datart"
                        aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Data
                            RT</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/data_warga" aria-expanded="false"><i class="mdi mdi-human-male-female"></i><span
                            class="hide-menu">Data
                            Warga</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="/data_pekerjaan" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span
                            class="hide-menu">Data
                            Pekerjaan</span></a></li>
                <li class="sidebar-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button role="button" type="submit"
                            class="sidebar-link waves-effect waves-dark sidebar-link logout-button"><i
                                class="mdi mdi-arrow-left-box"></i><span class="hide-menu">Logout</span></button>
                    </form>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
</aside>
