@if($model->exists)
    @php ($action = route('products.update'))
@else
    @php ($action = route('products.store'))
@endif

<form method="POST" action="{{ $action }}" autocomplete="off" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($model->exists)
        <input type="hidden" name="id" value="{{ $model->id }}">
    @endif
    <div class="box-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $model->title }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $model->price }}">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Description" rows="5" cols="33">
                        {{ $model->description }}
                    </textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>
            </div>
        </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat pull-right">Submit</button>
    </div>

</form>
