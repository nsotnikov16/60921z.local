<form action="{{ $action }}" method="POST" class="form" style="max-width: 600px">
    @csrf
    @method($method)
    @foreach ($fields as $code => $field)
        @php
            $fieldId = 'field-' . $code;
        @endphp
        <div class="mb-3">
            @if ($field['label'])
                <label for="{{ $fieldId }}" class="form-label">
                    {{ $field['label'] }}
                    @if ($field['required'] ?? false)
                        <span class="text-danger">*</span>
                    @endif
                </label>
            @endif
            @if (in_array($field['type'], ['text', 'email', 'tel', 'number']))
                <input id="{{ $fieldId }}" type="{{ $field['type'] }}" class="form-control"
                    placeholder="{{ $field['placeholder'] ?? '' }}" minlength="{{ $field['minlength'] ?? '' }}"
                    maxlength="{{ $field['maxlength'] ?? '' }}" pattern="{{ $field['pattern'] ?? '*' }}"
                    value="{{ $field['value'] ?: old($code) ?: '' }}" @required($field['required'] ?? false)
                    name="{{ $code }}" />
            @endif
            @if ($field['type'] === 'select')
                <select class="form-select" @required($field['required'] ?? false) name="{{ $code }}">
                    <option value="">{{ $field['emptyValue'] ?? 'Выберите значение' }}</option>
                    @isset($field['options'])
                        @foreach ($field['options'] as $option)
                            <option value="{{ $option['value'] }}" @selected($option['selected'] ?? false)>{{ $option['text'] }}
                            </option>
                        @endforeach
                    @endisset
                </select>
            @endif
            @error($code)
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">{{ $buttonText ?? 'Сохранить' }}</button>
</form>
