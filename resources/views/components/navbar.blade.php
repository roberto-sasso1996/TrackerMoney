<nav class="navbar navbar-expand-lg bg-nav">
    <div class="container-fluid">
      <a class="navbar-brand text-white ms-3" href="#"><i class="bi bi-cash-coin" style="font-size: 2rem"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('index')}}">Report</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Ciao {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><p class="dropdown-item bold" >{{$conto1}}</p></li>
              <li><hr class="dropdown-divider"></li>
              <li class="text-center">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>