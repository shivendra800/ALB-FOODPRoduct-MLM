  <!-- HEADER DESKTOP-->
  <header class="header-desktop">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="header-wrap" style="padding-left:1rem;">
               
                <form class="form-header" action="" method="POST">
                    {{-- <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." /> --}}
                    
                        {{-- <i class="zmdi zmdi-search"></i> --}}
                    </button>
                </form>
                <div class="header-button" >
                     <div class="div"></div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                
                               
                                <div class="account-dropdown__footer">
                                    <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->