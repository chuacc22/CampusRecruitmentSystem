<div class="ui attached stackable menu">
  <div class="ui container">
    <a href="{{URL::route('searchedResult.navi')}}" class="item">Find Job </a>
    <a href="{{URL::route('studentInbox.navi')}}" class="right item">Inbox </a>
    <div class="ui simple dropdown item">USERNAME
      <i class="dropdown icon"></i>
      <div class="menu">
        <a href="{{URL::route('studentUpdateProfile.navi')}}" class="item"> Profile </a>
        <a href="{{URL::route('studentMyJob.navi')}}" class="item"> My Job </a>
        <a class="item"> Log Out </a>
      </div>
    </div>
  </div>
</div>