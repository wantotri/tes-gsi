<div class="sidebar">
    <div class="img-container">
        <img
            src="{{ asset('images/blank-user.jpg') }}"
            width="200px"
            height="200px"
            alt="profile-picture"
            class="rounded-circle"
            loading="lazy"
        >
    </div>
    <ul>
        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li>
            <a href="{{route('input-transaksi')}}">Transaksi</a>
            <ul>
                <li><a href="{{route('input-transaksi')}}">Input</a></li>
                <li><a href="{{route('view-transaksi')}}">View</a></li>
            </ul>
        </li>
        <li><a href="{{route('logout')}}">Logout</a></li>
    </ul>
</div>