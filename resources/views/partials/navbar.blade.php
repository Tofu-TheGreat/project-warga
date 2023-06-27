<nav class="navbar navbar-expand-lg bg-success">
    <div class="container d-flex navbar-dark">
        <div class="div">
            <img class="navbar-brand rounded-circle" src="{{ asset('images/logo-sidawar-icon.png') }}"
                height="60px"></img>
        </div>
        <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link " aria-current="page" href="#fungsi">Fungsi</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link " aria-current="page" href="#fitur">Fitur</a>
                </li>
                @guest
                    <li class="nav-item mt-1">
                        <a href="/login" class="btn btn-success rounded-pill login-button" role="button"
                            style="background-color: rgb(59, 160, 59); padding: 4px 20px">Masuk</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
