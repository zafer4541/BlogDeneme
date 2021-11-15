@extends('Front.layouts.masterpage')
@section('title','Gönder')
@section('title2',$article_data->title)
@section('bg',$article_data->image)
@section('content')
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center text-justify">
            <div class="col-md-10 col-lg-10 col-xl-10" style="word-wrap: break-word">
               {!!$article_data->content!!}
                <br/>
                <br/>
                <div style=" float:right !important; font-size:18px !important;" class="text-success">Okunma Sayısı: {{$article_data->hit}}</div>
            </div>
        </div>
    </div>

</article>
<!-- Footer-->
@endsection
