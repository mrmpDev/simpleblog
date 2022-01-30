<x-panel-layout>
    <x-slot name="title">
        | نظرات
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
    </x-slot>
    <div class="breadcrumb">
        <ul>
            <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
            <li><a href="{{ route('comments.index') }}" class="is-active"> نظرات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="comments.html"> همه نظرات</a>
                <a class="tab__item " href="comments.html">نظرات تاییده نشده</a>
                <a class="tab__item " href="comments.html">نظرات تاییده شده</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>ارسال کننده</th>
                    <th>برای</th>
                    <th>دیدگاه</th>
                    <th>تاریخ</th>
                    <th>تعداد پاسخ ها</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <tr role="row">
                    <td><a href="">1</a></td>
                    <td><a href="">محمد نیکو</a></td>
                    <td><a href=""> لاراول</a></td>
                    <td>دوره خوبی بود</td>
                    <td>1399/05/01</td>
                    <td>13</td>
                    <td class="text-success">تاییده شده</td>
                    <td>
                        <a href="" class="mlg-15" title="">حذف</a>
                        <a href="show-comment.html" class="mlg-15" title="">رد</a>
                        <a href="show-comment.html" target="_blank" class="mlg-15" title="">مشاهده</a>
                        <a href="show-comment.html" class="mlg-15" title="">تایید</a>
                    </td>
                </tr>
                <tr role="row">
                    <td><a href="">1</a></td>
                    <td><a href="">محمد نیکو</a></td>
                    <td><a href="">دوره لاراول</a></td>
                    <td>دوره خوبی بود</td>
                    <td>1399/05/01</td>
                    <td>13</td>
                    <td class="text-error">تاییده نشده</td>
                    <td>
                        <a href="" class="mlg-15" title="">حذف</a>
                        <a href="show-comment.html" class="mlg-15" title="">رد</a>
                        <a href="show-comment.html" target="_blank" class="mlg-15" title="">مشاهده</a>
                        <a href="show-comment.html" class="mlg-15" title="">تایید</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</x-panel-layout>
