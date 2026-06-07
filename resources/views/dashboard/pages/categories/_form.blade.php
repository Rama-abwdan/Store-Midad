<div class="card-body">
                <div class="form-group">
                    {{-- <label for="exampleInputEmail1">Category Name:</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter category name" value="{{old('name',$category->name)  }}"> --}}
                    {{-- @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif --}}
                    {{-- @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror --}}
                    <x-form.input id="name" name="name" type="text" placeholder="Enter category Name" label="Enter Category Name" :value="$category->name"/> 
                        {{-- او بكتب بدال ال :value 
                        value = "{{ $category->name }}"
                        --}}
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Description:</label>
                    <textarea name="description" id="" class="from-control" cols="70" rows="10">{{ old('name',$category->description) }}</textarea>
                    @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    @endif
                    </div>

                    <x-form.select
                    label="Select Category Status"
                    name="status"
                    :option="[
                        'active'=>'Active',
                        'inactive' =>'Inactive'
                    ]"
                        :selected="$category->status ?? 'active'"/>

                    </div>