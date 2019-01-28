<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <!-- <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('dashboard')}}">Dashboard</a></li>
        <li><a href="{{url('company-master')}}">Company Master</a></li>
        <li><a href="{{url('model-master')}}">Model Master</a></li>
        <li><a href="{{url('issue-master')}}">Issue Master</a></li>
        <li><a href="{{url('price-master')}}">Price Master</a></li>
        <li><a href="{{url('/')}}">Find Issue Cost</a></li>
        <li><a href="{{url('get-search-history')}}">User Search Master</a></li>
        <li><a href="{{url('logout')}}">LogOut</a></li>
      </ul>
    </div> -->
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        @if($getrole[0]->role =='Admin')
          <li class="active"><a href="{{url('dashboard')}}">Dashboard</a></li>
          <li><a href="{{url('company-master')}}">Company Master</a></li>
          <li><a href="{{url('model-master')}}">Model Master</a></li>
          <li><a href="{{url('issue-master')}}">Issue Master</a></li>
          <li><a href="{{url('price-master')}}">Price Master</a></li>
          <li><a href="{{url('/')}}">Find Issue Cost</a></li>
          <li><a href="{{url('get-search-history')}}">User Search Master</a></li>
          <li><a href="{{url('logout')}}">LogOut</a></li>
        @else
          <li class="active"><a href="{{url('dashboard')}}">Dashboard</a></li>
          <li><a href="{{url('/')}}">Find Issue Cost</a></li>
          <li><a href="{{url('logout')}}">LogOut</a></li>
        @endif  
        
      </ul><br>
    </div>
    <br>