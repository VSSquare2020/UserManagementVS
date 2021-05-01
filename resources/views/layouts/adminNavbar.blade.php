<nav style="background-color: #333;" class="navbar navbar-expand-md navbar-light bg-black shadow-sm mb-5">
    <div  style="background-color: #333;" class="container">
        <a  style="color: white;" class="navbar-brand" href="{{ url('/admin-panel') }}">
            Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul style="list-style-type: none;margin: 0; padding: 0;overflow: hidden; background-color: #333;" class="navbar-nav mr-auto">
                <li style="float: left;" class="nav-item">
                    <a style=" font-size: 20px; display: block; color: white; text-align: center;padding: 14px 16px;text-decoration: none;" class="nav-link" href="/users">Users</a>
                </li>
                <li style="float: left;"  class="nav-item">
                    <a style="font-size: 20px;display: block; color: white; text-align: center;padding: 14px 16px;text-decoration: none;" class="nav-link" href="/products">Items</a>
                </li>
                <li style="float: left;"  class="nav-item">
                    <a style="font-size: 20px;display: block; color: white; text-align: center;padding: 14px 16px;text-decoration: none;" class="nav-link" href="/issue">Issue Items</a>
                </li>
                <li  style="float: left;"  class="nav-item">
                    <a style="font-size: 20px;display: block; color: white; text-align: center;padding: 14px 16px;text-decoration: none;" class="nav-link" href="/issue/view">Issued Item List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/issue/due_date">DUE DATES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/create">New User</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">                        
                <li class="nav-item dropdown">
                    <a style="color: white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>