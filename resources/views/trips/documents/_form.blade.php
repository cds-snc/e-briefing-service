@push('scripts')

<script>
    var file = document.getElementById('file');
    file.onchange = function() {
        if(file.files.length > 0) {
            document.getElementById('file-name').innerHTML = file.files[0].name;
        }
    }
</script>

@endpush

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

<strong>Document file (PDF only)</strong>
<div class="file has-name">
    <label class="file-label">
        <input class="file-input" type="file" name="file" id="file">
        <span class="file-cta">
            <span class="file-icon">
                <i class="fa fa-upload"></i>
            </span>
            <span class="file-label">
                Choose a file...
            </span>
        </span>
        <span class="file-name" id="file-name">
            ...
        </span>
    </label>
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