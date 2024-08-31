  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
      </div>
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary">Главная</a></li>
          </ul>
        
  @auth('web')
    <div class="btn-group text-end">
      <form action="{{ route('logout') }}"><button type="submit" class="btn btn-outline-primary me-2">Выйти</button></form>&nbsp;&nbsp;
      <form action="{{ route('user') }}"><button type="submit" class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
          </svg> {{ $user->email }}
        </button>
      </form>
    </div>
  @endauth

  @guest('web')
    <div class="btn-group text-end">
      <form action="{{ route('auth') }}"><button type="submit" class="btn btn-outline-primary me-2">Войти</button></form>
      <form action="{{ route('reg') }}"><button type="submit" class="btn btn-primary">Регистрация</button></form>
    </div>
  @endguest

    </header>
  </div>