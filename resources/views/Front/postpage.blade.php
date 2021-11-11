@extends('Front.layouts.masterpage')
@section('title','Gönder')
@section('title2',$article_data->title)
@section('bg',$article_data->image)
@section('content')
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
               {{$article_data->content}}
            </div>
        </div>
    </div>
</article>
<!-- Footer-->
@endsection
