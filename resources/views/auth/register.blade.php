<x-app-layout>
    <x-slot name="title">
        | صفحه ثبت نام
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">ثبت نام در وب‌سایت</h1>

                <form method="POST" action="{{ route('register.store') }}" class="sign-page__form">
                    @csrf


                    <div>
                        <input name="name" type="text" class="text text--right" placeholder="نام  و نام خانوادگی">
                        @error('name')
                            <p style="text-align: right; color: #D8000C; margin-bottom: 1rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input name="mobile" type="text" class="text text--left" placeholder="شماره موبایل">
                        @error('mobile')
                            <p style="text-align: right; color: #D8000C; margin-bottom: 1rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input name="email" type="text" class="text text--left" placeholder="ایمیل">
                        @error('email')
                            <p style="text-align: right; color: #D8000C; margin-bottom: 1rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input name="password" type="password" class="text text--left" placeholder="رمز عبور">
                        @error('password')
                            <p style="text-align: right; color: #D8000C; margin-bottom: 1rem">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <input name="password_confirmation" type="password" class="text text--left" placeholder="تکرار رمز عبور">
                    </div>


                    <button class="btn btn--blue btn--shadow-blue width-100 mb-10">ثبت نام</button>
                    <div class="sign-page__footer">
                        <span>در سایت عضوید ؟ </span>
                        <a href="{{ route('login') }}" class="color--46b2f0">صفحه ورود</a>

                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>

