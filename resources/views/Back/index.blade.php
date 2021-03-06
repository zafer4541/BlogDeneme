@extends('Back/layouts/master')
@section('title_panel','Makaleler')
@section('user',Str::Upper($name))
@section('content')



<div class="card shadow mb-4">
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}} </div>
    @endif

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-right">{{$articles->count()}} Adet sonuç bulundu</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Resim</th>
                    <th>Başlık</th>
                    <th>Hit</th>
                    <th>Durum</th>
                    <th>Katagori</th>
                    <th>Oluşturulma tarihi</th>
                    <th>Güncellenme tarihi</th>
                    <th>İşlem</th>
                </tr>
                </thead>
                <tbody >
                @foreach($articles as $makale)
                <tr>
                    <td ><img src="{{$makale->image}}"  width="200px" height="100px"></td>
                    <td style="vertical-align: middle" >{{$makale->title}}</td>
                    <td style="vertical-align: middle">{{$makale->hit}}</td>
                    <td style="vertical-align: middle">{!!$makale->durum==0 ? "<span class=\"text-danger\">Pasif</span>":"<span class=\"text-success\">Aktif</span>" !!}</td>
                    <td style="vertical-align: middle">{{$makale->getcatagory->name}}</td>
                    <td style="vertical-align: middle">{{$makale->created_at->diffforhumans()}}</td>
                    <td style="vertical-align: middle">{{$makale->updated_at->diffforhumans()}}</td>
                    <td style="vertical-align: middle; width:7rem;">
                        <a href="{{route('dashboard.makale.show',$makale->id)}}" class="btn btn-sm btn-success" title="Görüntüle"><i class="fa fa-eye"></i></a>
                        <a href="{{route('dashboard.makale.edit',$makale->id)}}" class="btn btn-sm btn-primary" title="Düzenle"><i class="fa fa-pen"></i></a>
                        <a href="{{route('dashboard.makale_delete',$makale->id)}}" class="btn btn-sm btn-danger" title="Sil"><i class="fa fa-times"></i></a>

                        <!--   <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                         onay formu include('Back/Widgets/onay') -->
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
