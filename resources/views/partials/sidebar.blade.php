<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <h5>SMP LUBABUL FATTAH</h5>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item {{ $title === 'Dashboard' ? 'active' : '' }}">
            <a href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- For Admin --}}
        @if (Auth::check() && Auth::user()->role == 1)
            <li class="sidebar-list-item {{ $title === 'Data Siswa' ? 'active' : '' }}">
                <a href="/admin/data-siswa">
                    <i class="bi bi-grid"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
        @endif

        {{-- For Siswa --}}

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
