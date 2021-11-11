<div class="list-group  col-md-3 " style="padding-top:2.5rem;" >
    <div class="card  " >
        <div class="card card-header">Katagoriler</div>
        @foreach($catagory_data as $data)
            <li class="list-group-item @if(Request::segment(1)==$data->slug) active @endif">
                <a href="{{route('catagorypage',$data->slug)}}">{{$data->name}}</a>
                <span class="badge bg-danger float-end">{{$data->getarticles->count()}}</span></li>
        @endforeach
    </div>
</div>
