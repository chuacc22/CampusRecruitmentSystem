<div class="ui attached stackable menu">
        <div class="ui container">
          <a href="{{URL::route('employerManageJob.navi')}}" class="item">Manage Job </a>
          <a href="{{URL::route('employerApplicationList.navi')}}"class="item">Application List </a>
          <a href="{{URL::route('employerInbox.navi')}}" class="right item">Inbox </a>
          <div class="ui simple dropdown item">{{Session::get('name')}}
            <i class="dropdown icon"></i>
            <div class="menu">
              <a href="{{URL::route('employerUpdateProfile.navi')}}" class="item"> Profile </a>
              <a href="{{url('login/logout')}}" class="item"> Log Out </a>
            </div>
          </div>
        </div>
      </div>