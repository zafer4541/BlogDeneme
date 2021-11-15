<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Uyarı!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">{{$makale->title}} başlıklı metni silmek istediğinizden eminmisiniz ?
            </div>
            <div class="modal-footer">
                <a href="{{route('dashboard.makale.index')}}" class="btn btn-success">Hayır</a>
                <a href="{{route('dashboard.makale_delete',$makale->id)}}" class="btn btn-danger">Evet</a>
            </div>
        </div>
    </div>
</div>
