<x-panel-layout>
    <x-slot name="title">
        | ایجاد کاربر جدید
    </x-slot>

    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('users.index') }}">کاربران</a></li>
            <li><a href="{{ route('users.create') }}" class="is-active">ایجاد کاربر جدید</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ایجاد کاربر کاربر</p>
                <form action="{{ route('users.store') }}" class="padding-30" method="POST">
                    @csrf
                    <input name="name" type="text" class="text" placeholder="نام و نام خانوادگی">
                    @error('name')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <input name="email" type="email" class="text" placeholder="ایمیل">
                    @error('email')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <input name="mobile" type="text" class="text" placeholder="شماره موبایل">
                    @error('mobile')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <select name="role">
                        <option value="user">کاربر عادی</option>
                        <option value="author">نویسنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                    @error('role')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <button class="btn btn-webamooz_net">ایجاد کاربر</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
