<div class="flapt-sidemenu-wrapper bg-white">
    <!-- Desktop Logo -->
    <div class="flapt-logo">
        <a href="index.html"><img class="desktop-logo" src="" alt="Desktop Logo">
            <img class="small-logo" src="" alt="Mobile Logo" />
        </a>
    </div>

    <!-- Side Nav -->
    <div class="flapt-sidenav" id="flaptSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu sidebar-carbon" data-widget="tree">
                    <li class="px-0 py-1
                    {{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('/') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-home'></i>
                                <span style="color: {{ request()->is('/') ? '#2A8D12' : '#1F2935' }}">Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-0 py-1
                    {{ request()->is('periode') || request()->is('periode/*') ? 'active' : '' }}">
                        <a href="{{ route('periode.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('periode') || request()->is('periode/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-time-five'></i>
                                <span
                                    style="color: {{ request()->is('periode') || request()->is('periode/*') ? '#2A8D12' : '#1F2935' }}">Periode</span>
                            </div>
                        </a>
                    </li>

                    <li
                        class="px-0 py-1
                    {{ request()->is('team') || request()->is('team/*') ? 'active' : '' }}">
                        <a href="{{ route('team.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('team') || request()->is('team/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-group'></i>
                                <span
                                    style="color: {{ request()->is('team') || request()->is('team/*') ? '#2A8D12' : '#1F2935' }}">Manajemen
                                    Tim</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-0 py-1
                    {{ request()->is('regional') || request()->is('regional/*') ? 'active' : '' }}">
                        <a href="{{ route('region.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('regional') || request()->is('regional/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-area'></i>
                                <span
                                    style="color: {{ request()->is('regional') || request()->is('regional/*') ? '#2A8D12' : '#1F2935' }}">Regional</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-0 py-1
                    {{ request()->is('zona') || request()->is('zona/*') ? 'active' : '' }}">
                        <a href="{{ route('zona.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('zona') || request()->is('zona/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-map'></i>
                                <span
                                    style="color: {{ request()->is('zona') || request()->is('zona/*') ? '#2A8D12' : '#1F2935' }}">Zona</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-0 py-1
                    {{ request()->is('hamparan') || request()->is('hamparan/*') ? 'active' : '' }}">
                        <a href="{{ route('hamparan.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('hamparan') || request()->is('hamparan/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-layer'></i>
                                <span
                                    style="color: {{ request()->is('hamparan') || request()->is('hamparan/*') ? '#2A8D12' : '#1F2935' }}">Hamparan</span>
                            </div>
                        </a>
                    </li>
                    <li
                        class="px-0 py-1
                    {{ request()->is('plot-area') || request()->is('plot-area/*') ? 'active' : '' }}">
                        <a href="{{ route('plot-area.index') }}">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: {{ request()->is('plot-area') || request()->is('plot-area/*') ? '#2A8D12' : '#1F2935' }}"
                                    class='bx bx-map-alt'></i>
                                <span
                                    style="color: {{ request()->is('plot-area') || request()->is('plot-area/*') ? '#2A8D12' : '#1F2935' }}">Plot
                                    Area</span>
                            </div>
                        </a>
                    </li>
                    <li class="px-0 py-1">
                        <a href="#">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: #1F2935" class='bx bx-map-pin'></i>
                                <span style="color: #1F2935">Mapping Area</span>
                            </div>
                        </a>
                    </li>
                    <li class="px-0 py-1">
                        <a href="#" class="btn-logout">
                            <div class="d-flex justify-content-center w-100">
                                <i style="color: #ED1800" class='bx bx-log-in-circle'></i>
                                <span style="color: #ED1800">Logout</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
