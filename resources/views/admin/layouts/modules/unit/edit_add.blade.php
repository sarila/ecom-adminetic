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
                                            placeholder="Unit Code" aria-describedby="code_reload_append">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="name">Unit Name<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="name" id="name" class="form-control" value="{{$unit->name ?? old('name')}}"
                                            placeholder="Unit Name">
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="symbol">Unit Symbol<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="symbol" id="symbol" class="form-control" value="{{$unit->symbol ?? old('symbol')}}"
                                            placeholder="Unit Symbol">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="baseunit">Base Unit<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select name="baseunit" id="baseunit" class="select2" style="width: 100%">
                                            <option selected disabled> Select Unit</option>
                                            <option value= "0" id="price">Piece</option>
                                            <option value= "1" id="length">Length</option>
                                            <option value= "2" id="capacity">Capacity</option>
                                            <option value= "3" id="weight">Weight</option>
                                        </select>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="opname">Operator Name</label>
                                <div class="input-group">
                                    <input type="text" name="opname" id="opname" class="form-control" value="{{$unit->opname ?? old('opname')}}"
                                        placeholder="Operator Name">
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="opvalue">Operator Value</label>
                                <div class="input-group">
                                    <input type="text" name="opvalue" id="opvalue" class="form-control" value="{{$unit->opvalue ?? old('opvalue')}}"
                                        placeholder="Operator Value">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminetic-edit-add-button :model="$unit ?? null" name="unit" />

</div>
