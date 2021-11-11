@extends('Front.layouts.masterpage')
@section('title','İletişim')
@section('title2','İletişim')
@section('content')
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center align-items-center">
                <div class="col-md-10 col-lg-8 col-xl-7 justify-content-center align-items-center">
                    <h2 style="text-align: center;">Mesaj göndermek istermisiniz?</h2>
                    <div class="my-5">
                        @if(session('succes') or session('errors'))
                            @if(session('succes'))
                            <div class="alert alert-success">
                                {{session('succes')}}
                            </div>
                            @else
                                @foreach($errors->all() as $error)
                            <div class="alert alert-danger"> {{$error}} </div>
                                @endforeach
                            @endif
                        @endif
                        <form method="post" action="{{route('contactpost')}}" >
                            @csrf
                            <div class="control-group">
                                <div class="form-group controls">
                                    <label for="name">Ad soyad</label>
                                    <input type="text" class="form-control" name="name" type="text" placeholder="Adınızı giriniz" />
                                </div>
                            </div>
                            <br />
                            <div class="control-group">
                                <div class="form-group controls">
                                    <label for="email">Email adresiniz</label>
                                    <input type="email" class="form-control" name="email" type="email" placeholder="E-maili giriniz"/>
                                </div>
                            </div>
                            <br />
                            <div class="control-group">
                                <div class="form-group controls">
                                    <label>Konu</label>
                                <select name="topic" class="form-control">
                                    <option>Bilgi</option>
                                    <option>Destek</option>
                                    <option>Genel</option>
                                </select>
                                </div>

                            </div>
                            <br />
                            <div class="control-group">
                                <div class="form-group controls">
                                    <label for="message">Mesajınız</label>
                                <textarea rows="5" class="form-control" name="message" placeholder="mesajınızı giriniz." style="height: 12rem"></textarea>

                            </div>
                            </div>
                            <br />

                            <button class="btn btn-primary text-uppercase" type="submit">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
