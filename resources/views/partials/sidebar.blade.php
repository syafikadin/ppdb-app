<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <h5>SMP LUBABUL FATTAH</h5>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item active">
            <a href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-list-item ">
            <a href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-list-item ">
            <a href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-list-item ">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mt-4 w-100">
                    <span>Logout</span>
                </button>
            </form>
        </li>


    </ul>

</div>
