<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend"><button class="btn btn-primary togglekonten"><i class="fas fa-plus"></i></button></div>
                <input type="text" class="form-control" placeholder="Buat Artikel" aria-label="Create Post" aria-describedby="addon-wrapping" name="title">
            </div>
        </div>
        <div id="postform">
            <div class="form-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="customFile">Post Cover</label>
                    <input type="file" name="image" accept="image/*" class="custom-file-input" id="image">
                </div>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="ckonten" cols="30" rows="10" class="form-control" id="summary-ckeditor"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Short Description</label>
                <textarea name="short_description" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="topic_id">Topik</label>
                <select name="topic_id" id="topic_id" class="custom-select">
                    <option selected>Pilih Topik</option>
                    @foreach ($topics as $key => $topic)
                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> SUBMIT</button>
            <button type="reset" class="btn togglekonten"><i class="fa fa-times"></i> CANCEL</button>
        </div>
        </form>
    </div>
</div>

@section('script')
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('ckonten');
</script>
@endsection