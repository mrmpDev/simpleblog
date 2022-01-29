<ul>
    <li class="item-li @if(request()->is('dashboard')) is-active @endif"><a href="{{ route('dashboard') }}">پیشخوان</a>
    </li>
    @if(auth()->user()->role === 'admin')
        <li class="item-li @if(request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif"><a
                href="{{ route('users.index') }}"> کاربران</a></li>
    @endif
    <li class="item-li"><a href="categories.html">دسته بندی ها</a></li>
    <li class="item-li"><a href="articles.html">مقالات</a></li>
    <li class="item-li"><a href="comments.html"> نظرات</a></li>
    <li class="item-li"><a href="user-information.html">اطلاعات کاربری</a></li>
</ul>
