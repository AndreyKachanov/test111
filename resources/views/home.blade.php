@php
    /** @var \App\Models\Admin\Item\Item $item */
    /** @var \App\Models\Admin\Item\Category $category */

    /** @var \Illuminate\Pagination\LengthAwarePaginator $items */
    /** @var \Illuminate\Database\Eloquent\Collection $categories */
@endphp
@extends('layouts.app')

@section('custom_css')

@endsection

@section('breadcrumbs', '')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">

        </div>


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
                                        src="{{ Storage::disk('uploads')->url($item->img) }}"
                                        alt="{{ $item->title }}"
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
                                </div>
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
    <script>
        console.log(123);
    </script>
@endsection
