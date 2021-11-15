@extends('Front.layouts.masterpage')
@section('title','Anasayfa')
@section('title2','Blog Sayfam')
@section('content')
    <!-- Main Content-->

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 col-xl-9">
            <?php $kontrol=false; ?>
            @foreach($article_data as $data)
                @if($data->durum==1)
                    @if($kontrol==true)
                        <!-- Divider-->
                            <hr class="my-4"/>
                    @endif
                        <?php $kontrol=true; ?>
                        <div class="post-preview" style="word-wrap: break-word">
                            <a href="{{route('catagory_slug',[$data->getcatagory->slug,$data->slug])}}">
                                <h2 class="post-title">{{$data->title}}</h2>
                                <img style="width: 100%;padding-bottom: 1rem;padding-top: 1rem;" src="{{$data->image}}">
                                <h3 class="post-subtitle">{!!Str::limit($data->content,150)!!}</h3>
                            </a>
                            <p class="post-meta">
                                Kategori: <a
                                    href="{{route('catagory_slug',[$data->getcatagory->slug,$data->slug])}}">{{$data->getcatagory->name}}</a>
                                <span class="float-end"> {{$data->created_at->diffForHumans()}}</span>
                            </p>
                        </div>
                @endif
            @endforeach
        </div>
            @include('Front.Widgets.catagoryWidget')
        </div>
    </div>
    <!-- Footer-->
@endsection
