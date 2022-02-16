@php
    /** @var \App\Models\Admin\Item\Item $item */
    /** @var \App\Models\Admin\Item\Category $category */

    /** @var \Illuminate\Pagination\LengthAwarePaginator $items */
    /** @var \Illuminate\Database\Eloquent\Collection $categories */
@endphp
@extends('layouts.app')

@section('custom_css')
    <link href="https://lk.easynetshop.ru/frontend/v5/ens-4c57d435.css" rel="stylesheet">
    <style>
        .button7 {
            font-weight: 700;
            color: white;
            text-decoration: none;
            padding: .8em 1em calc(.8em + 3px);
            border-radius: 3px;
            background: rgb(64,199,129);
            box-shadow: 0 -3px rgb(53,167,110) inset;
            transition: 0.2s;
        }
        .button7 {
            font-weight: 700;
            color: white;
            text-decoration: none;
            padding: .8em 1em calc(.8em + 3px);
            border-radius: 3px;
            background: rgb(64,199,129);
            box-shadow: 0 -3px rgb(53,167,110) inset;
            transition: 0.2s;
        }
        .button7:hover { background: rgb(53, 167, 110); }
        .button7:active {
            background: rgb(33,147,90);
            box-shadow: 0 3px rgb(33,147,90) inset;
        }


        button {
            background-color: rgb(243, 243, 243);
            border: 5px;
            color: #000000;
            padding: 15px 32px;
            text-align: center;

            cursor: pointer;
            -webkit-transition-duration: 0.6s;
            transition-duration: 0.6s;
            display: block;
            margin: 17px;

            float: left;
        }
        .button11 {
            position: relative;
            z-index: 1;
            color: black;
            font-size: 135%;
            font-weight: 700;
            text-decoration: none;
            padding: .25em .5em;
        }
        .button11:after {
            content: "от 5 000 руб";  /* здесь 6 букв */
            position: absolute;
            z-index: -1;
            top: -2px;
            bottom: -2px;
            left: -2px;
            width: calc(100% + 9*(1em*90/135) - 2px*2*2);  /* где 6*(1em*90/135), где 6 - это 6 букв, 90 - это font-size after, а 135 - это font-size родителя */
            text-align: right;
            color: #fff;
            font-size: 90%;
            padding: .25em .5em;
            border-radius: 5px;
            border: 2px solid #c61e40;
            -webkit-transform: skewX(-10deg);
            transform: skewX(-10deg);
            background: linear-gradient(#d4536d, #c61e40) no-repeat 100% 0;
            background-size: calc(9*(1em*90/135) + .5em) 100%;
            box-shadow: inset calc(-9*(1em*90/135) - .5em) 0 rgba(255,255,255,0);
            transition: .3s;
        }
        .button11:hover:after {
            box-shadow: inset calc(-9*(1em*90/135) - .5em) 0 rgba(255,255,255,.2);
        }
        .button11:active:after {
            background-image: linear-gradient(#c61e40, #d4536d);
        }


        .v1 {
            outline: 1px solid #e3e3e3;
            border: 1px;
            border-radius: 3px;
            width: 80px;
            height: 20px;
            float: left;
            padding: 3px 5px;
            margin-left: 10px;
            text-align: center;
            margin-bottom: 5px;
        }
        .v2 {

            border: 1px;
            border-radius: 3px;
            width: 80px;
            height: 25px;
            float: left;
            padding: 5px 5px;
            margin-left: 10px;
            background-color: #e3e3e3;
            text-align: center;
            color: #6b6866;
        }
        .v3 {

            border: 1px;
            border-radius: 3px;
            width: 190px;
            height: 25px;
            float: left;
            padding: 5px 5px;
            margin-left: 10px;
            background-color: #e3e3e3;
            text-align: center;
            color: #6b6866;
        }
        .v4 {
            outline: 1px solid #e3e3e3;
            border: 1px;
            border-radius: 3px;
            width: 90px;
            height: 20px;
            float: left;
            padding: 3px 5px;
            margin-left: 10px;
            text-align: center;
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('breadcrumbs', '')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">

            <div class="container">
                <div class="v4"><a href="https://t.me/bshop100" target=:_blank>Телеграмм</a></div>
                <div class="v4"><a href="https://vk.com/bshop100" target=:_blank>VK</a></div>
                <div class="v4"><a href="https://vm.tiktok.com/ZSefm7dBH/" target=:_blank>TikTok</a></div>
                <div class="v4"><a href="https://instagram.com/b_shop_optom?utm_medium=copy_link" target=:_blank>Instagram</a></div>
                <div class="v4"><a href="https://b-shop-optom.ru/" target=:_blank>Сайт</a></div>
                <div class="v4"><a href="https://youtube.com/channel/UC_1rML8W9qkuaVpIGZu2cjg" target=:_blank>YouTube</a></div>
                <br><br>

                <div class="v3">Менеджер Олег</div>
                <div class="v3">+7 915 254-32-01</div>
                <div class="v3"><a href="https://api.whatsapp.com/send?phone=79152543201" target=:_blank>Написать в WhatsApp</a></div>
                <br><br>

                <div class="v3">Менеджер Максим</div>
                <div class="v3">+7 915 432-97-92</div>
                <div class="v3"><a href="https://api.whatsapp.com/send?phone=79154329792" target=:_blank>Написать в WhatsApp</a></div>
            </div>
        </div>

{{--        <div class="card mb-3">--}}
{{--            <div class="card-header">Search</div>--}}
{{--            <div class="card-body">--}}
{{--                <form action="?" method="GET">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="title" class="col-form-label">Title</label>--}}
{{--                                <input id="title" class="form-control" name="title"--}}
{{--                                       value="{{ request('title') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="article_number" class="col-form-label">Article number</label>--}}
{{--                                <input id="article_number" class="form-control" name="article_number"--}}
{{--                                       value="{{ request('article_number') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <button type="submit" name="search_by_item"  class="btn btn-primary">Search</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

        <form action="?" method="GET">
            <div class="zz" >
                @foreach ($categories as $category)
                    <div >
                        <button style="margin: 4px; font-weight: 500;
                                      color: white;
                                      text-decoration: none;
                                      padding: .4em 10px ;
                                      border-radius: 3px;
                                      background: rgb(64,199,129);
                                      box-shadow: 0 -3px rgb(53,167,110) inset;
                                      transition: 0.2s;" type="submit" name="search_by_category" value="{{ $category->id }}">
                            {{ $category->title }}
                        </button>
                    </div>
                @endforeach
            </div>
        </form>

        <div class="card-body pb-0" style="color: #aaa">
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-12 col-sm-6 col-md-4 mb-4 d-flex align-items-stretch justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <img
                                        src="{{ Storage::disk('public')->url($item->img) }}"
                                        alt="{{ $item->title }}"
                                        {{--                                        width="300"--}}
                                        {{--                                        height="350"--}}
                                        class="img-fluid"
                                        style="margin-bottom: 15px"
                                />
                                <h5 style="font-weight: 500; color: black; text-decoration: none; font-size: 20px;">{{ $item->title }}</h5>
                                <p style="font-weight: 500; color: black; text-decoration: none; font-size: 13px;">Артикул:{{ $item->article_number }}</p>


                                <div>
                                    <div class="v1">от 5 тыс</div>
                                    <div class="v1">от 15 тыс</div>
                                    <div class="v1">от 60 тыс</div>
                                    <br>

                                    <div class="v2">{{ $item->price1  }} <span>РУБ</span></div>
                                    <div class="v2">{{ $item->price2  }} <span>РУБ</span></div>
                                    <div class="v2">{{ $item->price3  }} <span>РУБ</span></div>
                                </div><br><br>


                                <p><button style=" border: none; outline: 0;  padding: 12px;  color: white;  background-color: #c57f1c;  text-align: center;  cursor: pointer;
  width: 100%;  font-size: 18px;">Обсудить цену!</button></p>
                                    @isset($item->link)
                                        <div>
                                            <a class="btn-ens-action btn-ens-style" data-rel="{{ $item->link }}">Купить</a>
                                        </div>
                                    @endisset
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
        <form action="?" method="GET">
            <div class="zz" >
                @foreach ($categories as $category)
                    <div >
                        <button style="margin: 4px; font-weight: 500;
  color: white;
  text-decoration: none;
  padding: .4em 10px;
  border-radius: 3px;
  background: rgb(64,199,129);
  box-shadow: 0 -3px rgb(53,167,110) inset;
  transition: 0.2s;" type="submit" name="category" value="{{ $category->id }}">
                            {{ $category->title }}
                        </button>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
    <div class="pagination justify-content-center">
        {{ $items->appends(request()->except('page'))->links() }}
    </div>
@endsection
@section('scripts')
{{--    Готовый скрипт корзины--}}
    <script defer src="https://lk.easynetshop.ru/frontend/v5/ens-4c57d435.js"></script>
@endsection
