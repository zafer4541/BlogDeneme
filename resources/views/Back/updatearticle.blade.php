@extends('Back/layouts/master')
@section('title_panel','Makale oluştur')
@section('user',Str::Upper($name))
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success text-capitalize"> {{session('success')}} </div>
                @endif
                @foreach($errors->all() as $data)
                    <div class="alert alert-danger text-capitalize" >{{$data}}</div>
                @endforeach
                <form method="post" action="{{route('dashboard.makale_update',$article->id)}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Makale Başlığı</label>
                        <input type="text" value="{{$article->title}}" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Makale Katagorisi</label>
                        <select class="form-control" name="catagory">
                            <option value="">Seçim yapınız</option>
                            @foreach($catagory as $data )
                                <option value={{$data->id}} @if($data->id==$article->catagoryIdFk)selected @endif>{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label>Resim Seçiniz</label><br>
                    <img src="{{$article->image}}" width="300" height="300" class="form-group">
                    <div class="custom-file form-group">

                        <input type="file" value="{{$article->image}}" accept="png,jpeg,jpg" class="custom-file-input form-control" id="validatedCustomFile" name="resim">
                        <label class="custom-file-label" for="validatedCustomFile">{{$article->image}}</label>
                        <div class="invalid-feedback">Geçersiz dosya biçimi</div>
                    </div>
                    <div class="form-group">
                        </br>
                        <label>Makale İçeriği</label>
                        <textarea class="form-control disabled" id="editor" style="height:200px"   rows="4" name="icerik" >{!!$article->content!!}</textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" style="transform: scale(1.1);"  @if($article->durum==1)checked @endif
                        id="exampleCheck1" name="durum" value="1">
                        <label class="form-check-label" for="exampleCheck1" style="font-size: 18px">Aktif</label>
                    </div>
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                </form>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css"rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                height:200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
