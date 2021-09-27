<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name"> Name<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control" value="{{$tax->name ?? old('name')}}"
                                    placeholder="Tax Name">
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="type">Tax Type </label>
                            <div class="input-group">
                                <select name="type" id="type" class="select2" style="width: 100%">
                                    <option selected disabled>Select Tax Type .. </option>
                                    <option value= "0" id="flat">Flat</option>
                                    <option value= "1" id="percent">Percentage</option>
                                </select>
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <label for="value">Tax Amount<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <!-- <div class="input-group-prepend" > -->
                                    <button class="btn btn-light input-group-prepend" type="button" id="tax_symbol">Rs.</button>
                               <!--  </div> -->
                                <input type="number" name="value" id="value" class="form-control" value="{{$tax->value ?? old('value')}}"
                                    placeholder="Tax Value" aria-describedby="tax_symbol" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-adminetic-edit-add-button :model="$tax ?? null" name="tax" />

</div>
