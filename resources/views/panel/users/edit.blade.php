<x-panel-layout>
    <x-slot name="title">
        | ویرایش کاربر
    </x-slot>

    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('users.index') }}">کاربران</a></li>
            <li><a href="{{ route('users.edit',1) }}" class="is-active">ویرایش کاربران</a></li>
        </ul>
    </div>
    <div class="main-content font-size-13">
        <div class="row no-gutters bg-white margin-bottom-20">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{ route('users.update', $user->id) }}" class="padding-30" method="POST">
                    @method('put')
                    @csrf
                    <input name="name" type="text" value="{{ $user->name }}" class="text"
                           placeholder="نام و نام خانوادگی">
                    @error('name')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <input name="email" type="email" value="{{ $user->email }}" class="text" placeholder="ایمیل">
                    @error('email')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <input name="mobile" type="text" value="{{ $user->mobile }}" class="text"
                           placeholder="شماره موبایل">
                    @error('mobile')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <select name="role">
                        <option value="user" @if($user->role === 'user') selected @endif>کاربر عادی</option>
                        <option value="author" @if($user->role === 'author') selected @endif>نویسنده</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>مدیر</option>
                    </select>
                    @error('role')
                    <p class="error_message">
                        {{ $message }}
                    </p>
                    @enderror
                    <button class="btn btn-webamooz_net">ویرایش کاربر</button>
                </form>

            </div>
        </div>

    </div>
</x-panel-layout>

