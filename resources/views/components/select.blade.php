@props([
    'label_class' => "",
    'input_class' => "",
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'name', 
    'label' => '',
    'placeholder' => '', 
    'value' => null,
    'lookup' => [],
])

@dd($lookup)
<div class="mb-3">
    @if (!empty($label))
        <label 
            for="{{ $name }}" 
            {{ $attributes->class(['text-danger' => !empty($error)])->merge(['class' => 'form-label '.$label_class]) }}>
            
            @if ($required)
                <span class="required">{{ $label }}</span>
            @else
                {{ $label }}
            @endif
        </label>
    @endif
    <select class="form-select {{ $input_class }}" aria-label="Default select example">
        @foreach ($lookup as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
</div>