<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <h2 class="fw-bold  m-0 p-0" style="letter-spacing: 8px">SMPTM</h2>
            <h6 class="  m-0 p-0" style="letter-spacing: 1px">LUBABUL FATTAH</h6>
        </div>
    </div>
    <ul class="sidebar-list">

        {{-- For Admin --}}
        @if (Auth::check() && Auth::user()->role == 1)
            <li class="sidebar-list-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                <a href="/admin">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-list-item {{ $title === 'Data Pendaftar' ? 'active' : '' }}">
                <a href="/admin/data-pendaftar">
                    <i class="bi bi-grid"></i>
                    <span>Data Pendaftar</span>
                </a>
            </li>
            <li class="sidebar-list-item {{ $title === 'Data Ujian' ? 'active' : '' }}">
                <a href="/admin/data-ujian">
                    <i class="bi bi-grid"></i>
                    <span>Data Ujian</span>
                </a>
            </li>
        @endif

        {{-- For Siswa --}}
        @if (Auth::check() && Auth::user()->role == 2)
            <li class="sidebar-list-item {{ $title === 'Dashboard' ? 'active' : '' }}">
                <a href="/siswa">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-list-item {{ $title === 'Pendaftaran' ? 'active' : '' }}">
                <a href="/siswa/pendaftaran">
                    <i class="bi bi-grid"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>

            <li class="sidebar-list-item {{ $title === 'Profil' ? 'active' : '' }}">
                <a href="/siswa/profil">
                    <i class="bi bi-grid"></i>
                    <span>Profil</span>
                </a>
            </li>
        @endif

    </ul>

    {{-- Logout button --}}
    <div class="account-logout">
        <form action="/logout" method="post" class="w-100">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <span>Logout</span>
            </button>
        </form>
    </div>

</div>
