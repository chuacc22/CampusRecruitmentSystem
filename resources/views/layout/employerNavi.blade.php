<div class="ui attached stackable menu">
        <div class="ui container">
          <a href="{{URL::route('employerPostJob.navi')}}" class="item">Post Job </a>
          <a class="item">Application List </a>
          <a href="{{URL::route('employerInbox.navi')}}" class="right item">Inbox </a>
          <div class="ui simple dropdown item">USERNAME
            <i class="dropdown icon"></i>
            <div class="menu">
              <a href="{{URL::route('employerUpdateProfile.navi')}}" class="item"> Profile </a>
              <a class="item"> Log Out </a>
            </div>
          </div>
        </div>
      </div>