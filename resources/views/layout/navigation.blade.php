<div class="ui attached stackable menu">
  <div class="ui container">
    <a href="{{URL::route('searchedResult.navi')}}" class="item">Search Job </a>
    <a href="{{URL::route('studentInbox.navi')}}" class="right item">Inbox </a>
    <div class="ui simple dropdown right item">{{Session::get('name')}}
      <i class="dropdown icon"></i>
      <div class="menu">
        <a href="{{URL::route('studentSearchProfile.navi')}}" class="item"> Profile </a>
        <a href="{{URL::route('studentMyJob.navi')}}" class="item"> My Job </a>
        <a href="{{url('login/logout')}}" class="item"> Log Out </a>
      </div>
    </div>
  </div>
</div>