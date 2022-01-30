<x-panel-layout>
    <x-slot name="title">
        | ایجاد مقاله جدید
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="articles.html"> مقالات</a></li>
            <li><a href="create-new-course.html" class="is-active">ایجاد مقاله جدید</a></li>
        </ul>
    </div>
    <div class="main-content padding-0">
        <p class="box__title">ایجاد مقاله جدید</p>
        <div class="row no-gutters bg-white">
            <div class="col-12">
                <form action="{{ route('posts.store') }}" method="POST" class="padding-30"
                      enctype="multipart/form-data">
                    @csrf
                    <input name="title" type="text" class="text" placeholder="عنوان مقاله">
                    <ul class="tags">

                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="dsfsdf" name="categories[]"></li>
                        <li class="addedTag">dsfsdf<span class="tagRemove" onclick="$(this).parent().remove();">x</span>
                            <input type="hidden" value="dsfsdf" name="categories[]"></li>
                        <li class="tagAdd taglist">
                            <input type="text" id="search-field">
                        </li>
                    </ul>

                    <div class="file-upload">
                        <div class="i-file-upload">
                            <span>آپلود بنر دوره</span>
                            <input type="file" class="file-upload" id="files" name="banner"/>
                        </div>
                        <span class="filesize"></span>
                        <span class="selectedFiles">فایلی انتخاب نشده است</span>
                    </div>
                    <textarea placeholder="متن مقاله" class="text "></textarea>
                    <button class="btn btn-webamooz_net">ایجاد مقاله</button>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('blog/panel/js/tagsInput.js') }}"></script>
    </x-slot>
</x-panel-layout>
