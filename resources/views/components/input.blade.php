@props([
    'label_class' => "",
    'input_class' => "",
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'type' => 'text',
    'name', 
    'label' => '',
    'placeholder' => '', 
    'value' => null,
    'error' => null,
    'option' => ''
])

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
    <input 
            type="{{ $type }}" 
            placeholder="{{ $placeholder }}"
            class="{{ 'form-control form-control-sm border-input '.$input_class }}"
            id="{{ $name }}"
            name="{{ $name }}" 
            value="{{ $value }}"
            {{ $option  ?? '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $disabled ? 'disabled' : '' }}>
</div>