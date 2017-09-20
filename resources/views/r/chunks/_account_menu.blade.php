<nav id="GP-menu" class="GP-menu">
  <ul class="aside-menu play-menu">
    <li>
      <a href="{{route('user.account')}}" class="my-account">
        <span class="icon icon-man-user"></span>
        <span class="list-text">{{trans('messages.my_account')}}</span>
      </a>
    </li>
    <li>
      <a href="{{route("user.package")}}" class="packages">
        <span class="icon">
          <span class="noicon"></span>
        </span>
        <span class="list-text">{{trans('messages.packages')}}</span>
      </a>
    </li>
  </ul>
</nav>