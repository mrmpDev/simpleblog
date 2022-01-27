<x-app-layout>
    <x-slot name="title">
        | بازیابی رمزعبور
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form method="POST" action="{{ route('password.email') }}" class="sign-page__form">
                    <input name="email" type="text" class="text text--left" placeholder="ایمیل">
                    @csrf

                    @error('email')
                    <p style="text-align: right; color: #D8000C; margin-bottom: 1rem">
                        {{ $message }}
                    </p>
                    @enderror

                    @if(Session::has('status'))
                        <p style="text-align: right; color: mediumseagreen; margin-bottom: 1rem">
                            {{ Session::get('status') }}
                        </p>
                    @endif


                    <button class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                    <div class="sign-page__footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="register.html" class="color--46b2f0">صفحه ثبت نام</a>

                    </div>

                </form>
            </div>
        </div>
    </main>
</x-app-layout>
