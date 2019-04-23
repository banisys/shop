<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" style="margin-top: 20px">
            <li class="active">
                <a href="{{url('/')}}">
                    <i class="icon-home icon-large"></i>
                    <span> صفحه اصلی </span>
                </a>
            </li>
            <li class="sub-menu">

                <a href="#"><i class="icon-shopping-cart icon-large"></i>
                    <span> محصولات </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('laptop.index')}}">لپ تاپ</a></li>
                </ul>

            </li>

            <li class="sub-menu">

                <a href="#"><i class="icon-list icon-large"></i>
                    <span> سفارشات </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('order.admin_list')}}">لیست سفارشات</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="#"><i class="icon-user icon-large"></i>
                    <span> کاربران </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    {{--@can('delete')--}}
                    <li><a class="" href="{{route('user.index')}}">لیست کاربران</a></li>
                    <li><a class="" href="{{route('role.index')}}">لیست سطوح دسترسی</a></li>
                    <li><a class="" href="{{route('permission.index')}}">لیست دسترسی ها</a></li>
                    {{--@endcan--}}
                    {{--@cannot('delete')--}}
                        <li><a class="" href="#">اجازه دسترسی ندارید</a></li>
                    {{--@endcan--}}
                </ul>
            </li>

            <li class="sub-menu">
                <a href="#"><i class="icon-picture"></i>
                    <span> اسلایدر </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('slider.create')}}">افزودن</a></li>
                    <li><a class="" href="{{route('slider.link')}}">لینکدار کردن تصاویر</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="#"><i class="icon-bookmark-empty"></i>
                    <span> بنر </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('baner.create')}}">افزودن</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="#"><i class="icon-question"></i>
                    <span> پرسش و پاسخ </span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{route('ask.inbox')}}">پیام های دریافتی</a></li>
                    <li><a class="" href="{{route('ask.outbox')}}">پیام های ارسالی</a></li>
                </ul>
            </li>

        </ul>

    </div>
</aside>
