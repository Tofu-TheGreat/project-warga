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
                        <a class="nav-link dropdown-toggle capitalize" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome Back, {{ auth()->user()->nama_lengkap }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i
                                        class="bi bi-speedometer2 me-2"></i>Dashboard</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-left me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
