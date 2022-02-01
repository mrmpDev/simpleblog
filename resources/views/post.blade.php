<x-app-layout>
    <x-slot name="title">
        | صفحه پست {{ $post->title }}
    </x-slot>
    <main>
        <div class="container article">
            <article class="single-page">
                <div class="breadcrumb">
                    <ul class="breadcrumb__ul">
                        <li class="breadcrumb__item"><a href="{{ route('landing') }}" class="breadcrumb__link"
                                                        title="خانه">بخش مقالات</a></li>
                        <li class="breadcrumb__item"><a href="{{ route('post.show', $post->slug) }}"
                                                        class="breadcrumb__link"
                                                        title="فریم ورک لاراول چیست ؟‌">{{ $post->title }}</a></li>
                    </ul>

                </div>
                <div class="single-page__title">
                    <h1 class="single-page__h1">{{ $post->title }}</h1>
                    @auth
                        <span class=" single-page__like @if($post->is_user_liked) single-page__like--is-active @endif">@if($post->is_user_liked)
                                liked @endif</span>
                    @endauth
                </div>
                <div class="single-page__details">
                    <div class="single-page__author">نویسنده : {{ $post->user->name }}</div>
                    <div class="single-page__date">تاریخ : {{ $post->getCreatedAtInJalali() }}</div>
                </div>
                <div class="single-page__img">
                    <img class="single-page__img-src" src="{{ $post->getBannereUrl() }}" alt="">
                </div>
                <div class="single-page__content">
                    <p class="single-page__txt">
                        {!! $post->content !!}
                    </p>
                </div>
                <span style="height: 35px;"></span>
                <div class="single-page__tags">
                    <ul class="single-page__tags-ul">
                        @foreach($post->categories as $category)
                            <li class="single-page__tags-li"><a href=""
                                                                class="single-page__tags-link">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </article>
        </div>
        <div class="container">
            <div class="comments" id="comments">
                @auth
                    <div class="comments__send">
                        <div class="comments__title">
                            <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                            <span class="comments__count">  نظرات ( {{$post->comments_count}} ) </span>
                        </div>
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="comment_id" value="" id="reply-input">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea class="comments__textarea" name="content" placeholder="بنویسید"></textarea>
                            <button class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                            <button class="btn btn--red btn--shadow-red">انصراف</button>
                        </form>
                    </div>
                @else
                    <p>برای ارسال نظر باید ایتدا وارد سایت شوید</p>
                @endAuth
                <div class="comments__list">
                    @foreach($post->comments as $comment)
                        @include('comments.comment', ['comment' => $comment])
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <x-slot name="scripts">
        <script>
            function setReplyValue(id) {
                document.getElementById('reply-input').value = id;
            }

            $(".single-page__like").on("click", function () {
                fetch('{{ route("like.post", $post->slug) }}', {
                    method: 'post',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                    }
                }).then((response) => {
                    if (response.ok) {
                        $(this).toggleClass("single-page__like--is-active");
                    }
                })

            })
        </script>
    </x-slot>
</x-app-layout>
