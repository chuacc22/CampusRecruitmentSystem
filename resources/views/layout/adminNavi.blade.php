<div class="ui attached stackable menu">
        <div class="ui container">
          <a href="{{URL::route('adminManageEmployer.navi')}}" class="item">Manage Employer </a>
          <a href="{{URL::route('adminManageStudent.navi')}}"class="item">Manage Student </a>
          <div class="ui simple dropdown item"> Manage Special Application 
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="{{URL::route('adminViewNewSpecialList.navi')}}"> New Applications </a>
                <a class="item" href="{{URL::route('adminViewSentSpecialList.navi')}}"> Sent Applications </a>
              </div>
            </div>
          <a href="{{URL::route('adminInbox.navi')}}" class="item">Inbox </a>
          <div class="ui simple dropdown right item">{{Session::get('name')}} 
            <i class="dropdown icon"></i>
            <div class="menu">
              <a href="{{URL::route('adminUpdatePassword.navi')}}" class="item"> Change Password </a>
              <a href="{{url('login/logout')}}" class="item"> Log Out </a>
            </div>
          </div>
        </div>
      </div>