@props([
    'label' =>'',
    'name'=>'',
    'option'=>[],
    'selected'=>''
])
<label for="{{ $name }}">{{ $label }}</label>
<select name="{{ $name }}" class="form-control
@error('{{ $name }}') is-invalid @enderror">
    
    @foreach ($option as $value=>$text )
        <option value="{{ $value }}"
        @if($value == old($name,$selected)) selected @endif
        >{{ $text }}</option>
    @endforeach
</select>
@error('{{ $name }}')
    <p class="text-danger">{{ $message }}</p>
@enderror