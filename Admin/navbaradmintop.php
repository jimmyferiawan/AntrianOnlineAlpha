<style> 
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu>.dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -6px;
  margin-left: -1px;
  -webkit-border-radius: 0 6px 6px 6px;
  -moz-border-radius: 0 6px 6px 6px;
  border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
  display: block;
}

.dropdown-submenu>a:after {
  display: block;
  content: " ";
  float: right;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
  border-width: 5px 0 5px 5px;
  border-left-color: #cccccc;
  margin-top: 5px;
  margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
  border-left-color: #ffffff;
}

.dropdown-submenu.pull-left {
  float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
  left: -100%;
  margin-left: 10px;
  -webkit-border-radius: 6px 0 6px 6px;
  -moz-border-radius: 6px 0 6px 6px;
  border-radius: 6px 0 6px 6px;
}
</style>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color: white; margin-left: 0.1%;"> Administrator</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul> -->
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-bell"></span> New Notifications</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-dashboard"></span> Ubah Data <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class="dropdown-submenu ">
    <a tabindex="-1" class="dropdown-toggle topLevel" data-toggle="dropdown" href="#">
        News
        <i class="icon icon-caret-right"></i>
      </a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">A & E Passer</a>
        <ul class="dropdown-menu" style="position: absolute; left: 100%">
          <li><a href="#">Elementary</a></li>
          <li><a href="#">Secondary</a></li>
        </ul>
      </li>
    </ul>
  </li>         
         <li class="dropdown-submenu ">
    <a tabindex="-1" class="dropdown-toggle topLevel" data-toggle="dropdown" href="#">
        News
        <i class="icon icon-caret-right"></i>
      </a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">A & E Passer</a>
        <ul class="dropdown-menu" style="position: absolute; left: 100%">
          <li><a href="#">Elementary</a></li>
          <li><a href="#">Secondary</a></li>
        </ul>
      </li>
    </ul>
  </li>         
   <li class="dropdown-submenu ">
    <a tabindex="-1" class="dropdown-toggle topLevel" data-toggle="dropdown" href="#">
        News
        <i class="icon icon-caret-right"></i>
      </a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">A & E Passer</a>
        <ul class="dropdown-menu" style="position: absolute; left: 100%">
          <li><a href="#">Elementary</a></li>
          <li><a href="#">Secondary</a></li>
        </ul>
      </li>
    </ul>
  </li>         
   <li class="dropdown-submenu ">
    <a tabindex="-1" class="dropdown-toggle topLevel" data-toggle="dropdown" href="#">
        News
        <i class="icon icon-caret-right"></i>
      </a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">A & E Passer</a>
        <ul class="dropdown-menu" style="position: absolute; left: 100%">
          <li><a href="#">Elementary</a></li>
          <li><a href="#">Secondary</a></li>
        </ul>
      </li>
    </ul>
  </li>         


           <!--  <li><a href="#">Rumah Sakit</a></li>
            <li><a href="#">Puskesmas</a></li>
            <li><a href="#">Klinik</a></li> -->
            <li role="separator" class="divider"></li>
            <li><a href="#">Dokter Umum</a></li>
             <li class="dropdown-submenu ">
    <a tabindex="-1" class="dropdown-toggle topLevel" data-toggle="dropdown" href="#">
        News
        <i class="icon icon-caret-right"></i>
      </a>
    <ul class="dropdown-menu">
      <li class="dropdown-submenu">
        <a href="#">A & E Passer</a>
        <ul class="dropdown-menu" style="position: absolute; left: 100%">
          <li><a href="#">Elementary</a></li>
          <li><a href="#">Secondary</a></li>
        </ul>
      </li>
    </ul>
  </li>         
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-check"></span> New Validation</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> User Control</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>