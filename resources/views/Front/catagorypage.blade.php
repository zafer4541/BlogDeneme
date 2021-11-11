@extends('Front.layouts.masterpage')
@section('title','Katagoriler')
@section('title2',$catagory_name)
@section('content')
    <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-9">
                    @foreach($article_inCatagory as $data)
                        <div class="post-preview">
                            <a href="{{route('catagory_slug',[$data->getcatagory->slug,$data->slug])}}">
                                <h2 class="post-title">{{$data->title}}</h2>
                                <img style="width: 100%;padding-bottom: 1rem;padding-top: 1rem;"  src="{{$data->image}}">
                                <h3 class="post-subtitle">{{Str::limit($data->content,150)}}</h3>
                            </a>
                            <p class="post-meta">
                                Kategori:  <a href="{{route('catagory_slug',[$data->getcatagory->slug,$data->slug])}}">{{$data->getcatagory->name}}</a>
                                <span class="float-end"> {{$data->created_at->diffForHumans()}}</span>
                            </p>
                        </div>
                        @if(!$loop->last)
                        <!-- Divider-->
                            <hr class="my-4" />
                        @endif
                    @endforeach
                </div>
                @include('Front.Widgets.catagoryWidget')
            </div>
        </div>
@endsection
