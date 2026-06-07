@props([
    'id',
    'name',
    'type'=>'text',
    'value'=>'',
    'label'=>'',
    'placeholder'=>'',

])
<label for="{{ $id }}">{{ $label }}</label>
<input type="{{ $type  ?? 'text' }}" class="form-control
@error($name) is-invalid 
    
@enderror" 
placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name,$value) }}">
    @error($name)
        <p class="text-danger">{{ $message }}</p>
    @enderror