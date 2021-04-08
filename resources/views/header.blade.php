<header>
            <div class="row py-3">
                <div class="col-md-6">
                    Welcome Back ,{{Auth::user()->name}}
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{url('logout')}}" class="btn btn-logout">Logout</a>
                </div>
            </div>
        </header>