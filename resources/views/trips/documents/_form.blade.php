<div class="field">
    <label class="label" for="name">{{ __('Document name') }}</label>
    <p class="control">
        <input type="text" class="input" name="name" id="name" value="{{ old('name', $document->name) }}">
    </p>
</div>

<!-- @TODO: add autocomplete/suggestions based on existing categories in this trip -->
<div class="field">
    <label class="label" for="document_type">{{ __('Document type') }}</label>
    <p class="control">
        <input type="text" class="input" name="document_type" id="document_type" value="{{ old('document_type', $document->document_type) }}">
    </p>
</div>

<div class="field">
    <p class="control">
        <input type="file" name="file" id="file">
    </p>
</div>

<div class="field">
    <p class="control">
        <label class="checkbox">
            {{ Form::checkbox('is_protected', 1, $document->is_protected) }}
            Contains protected information
        </label>
    </p>
    <p class="help">* Protected information cannot be synced to devices remotely</p>
</div>