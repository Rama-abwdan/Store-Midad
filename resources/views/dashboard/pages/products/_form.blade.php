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
                    <x-form.input id="name" name="name" type="text" placeholder="Enter product Name" label="Enter Product Name" :value="$product->name"/> 
                        {{-- او بكتب بدال ال :value 
                        value = "{{ $product->name }}"
                        --}}
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Description:</label>
                    <textarea name="description" id="" class="from-control" cols="70" rows="10">{{ old('name',$product->description) }}</textarea>
                    @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    @endif
                    </div>

                    <x-form.select
                    label="Select Store Status"
                    name="status"
                    :option="[
                        'active'=>'Active',
                        'inactive' =>'Inactive'
                    ]" 
                        :selected="$product->status ?? 'active'"/>
                        <x-form.select
                        label="Select Product Store"
                        name="store_id"
                        :option="$stores"
                        :selected="$product->store_id ?? ''"/>

                        <x-form.select 
                        label="select Product Category"
                        name="category_id"
                        :option="$categories"
                        :selected="$product->category_id ?? ''"
                        />

                    <div class="form-group">
                    <x-form.input id="price" name="price" type="text" placeholder="Enter product Price" label="Enter Product Price" :value="$product->price"/>
                    </div>

                    </div>
