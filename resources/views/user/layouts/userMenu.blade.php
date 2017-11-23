<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-success">
              <div class="panel-heading">Здравствуйте {{ Auth::user()->name }} {{ Auth::user()->lastname }}</div>

              <div class="panel-body">

                <div class="row user_menu">
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">  
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                      </div>
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav nav-pills col-md-12">
                          <li role="presentation" class="{{ ( Request::is('user')) ? 'user_menu_active' : ''}}"><a href="{{ route('userIndex') }}">Личный кабинет</a></li>
                          <li role="presentation" class="{{ ( Request::is('user/myProfile') || Request::is('user/myProfile/edit') || Request::is('user/myProfile/changePassword') || Request::is('user/myProfile/testimonials')) ? 'user_menu_active' : ''}}"><a href="{{ route('userMyProfile') }}">Мой профиль</a></li>
                          <li role="presentation"  class="{{ ( Request::is('user/payment')) ? 'user_menu_active' : ''}}"><a href="{{ route('payment') }}">Пополнить счёт</a></li>
                          <li role="presentation" class="{{ ( Request::is('user/orderWithHelp')) ? 'user_menu_active' : ''}}"><a href="{{ route('orderWithHelp') }}">Покупка с нашей помощью</a></li>
                          <li role="presentation" class="{{ ( Request::is('user/orderSelf')) ? 'user_menu_active' : ''}}"><a href="{{ route('orderSelf') }}">Самостоятельная покупка</a></li>
                          <li role="presentation" class="{{ ( Request::is('user/instruction')) ? 'user_menu_active' : ''}}"><a href="{{ route('instruction')}}">Инструкции</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>