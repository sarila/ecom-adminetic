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
                                            placeholder="Category Code" aria-describedby="code_reload_append">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="name">Category Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$category->name ?? old('name')}}"
                                            placeholder="Category Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="heavytexteditor">
                          @isset($post->description)
                              {!! $post->description !!}
                          @endisset
                          </textarea>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="parent_id">Category </label>
                                <div class="input-group">
                                    <select name="parent_id" id="parent_id" class="select2" style="width: 100%">
                                        <option selected disabled>Select Parent Category .. </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <label for="priority">Priority</label>
                        <div class="input-group">
                            <input type="number" name="priority" id="priority" class="form-control" value="{{$category->priority ?? old('priority')}}"
                                placeholder="Priority">
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <label for="status">Status<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select name="status" id="status" class="select2" style="width: 100%">
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <label for="image">Category Image</label>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="file" name="image" id="image" accept="image/*" onchange="readURL(this);">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if (isset($category->image))
                                <img src="{{asset('storage/'.$category->image)}}" alt="{{$category->name ?? ''}}" class="img-fluid"
                                    id="category_image" style="width: 60px">
                                @endif
                                <img src="" id="category_image_placeholder" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminetic-edit-add-button :model="$category ?? null" name="category" />

</div>

