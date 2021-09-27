<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="code">Code<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" id="code_reload_append">
                                            <button class="btn btn-primary" type="button" id="code_reload"><i
                                                    class="fa fa-refresh"></i></button>
                                        </div>
                                        <input type="text" name="code" id="code" class="form-control" value="{{$category->code ?? old('code')}}"
                                            placeholder="Brand Code" aria-describedby="code_reload_append">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="name"> Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$brand->name ?? old('name')}}"
                                            placeholder="Brand Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <label for="image">Brand Image</label>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if (isset($brand->image))
                                <img src="{{asset('storage/'.$brand->image)}}" alt="{{$brand->name ?? ''}}" class="img-fluid"
                                    id="brand_image" style="width: 60px">
                                @endif
                                <img src="" id="brand_image_placeholder" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminetic-edit-add-button :model="$brand ?? null" name="brand" />
</div>
