<div class="field">
    <label class="label" for="first_name">{{ __('First name') }} (required)</label>
    <p class="control">
        <input type="text" class="input" name="first_name" id="first_name" value="{{ old('first_name', $person->first_name) }}">
    </p>
</div>
<div class="field">
    <label class="label" for="last_name">{{ __('Last name') }} (required)</label>
    <p class="control">
        <input type="text" class="input" name="last_name" id="last_name" value="{{ old('last_name', $person->last_name) }}">
    </p>
</div>
<div class="field">
    <label class="label" for="last_name">{{ __('Email') }}</label>
    <p class="control">
        <input type="text" class="input" name="email" id="email" value="{{ old('email', $person->email) }}">
    </p>
</div>

<div class="field">
    <label class="label" for="telephone">{{ __('Telephone') }}</label>
    <p class="control">
        <input type="text" class="input" name="telephone" id="telephone" value="{{ old('telephone', $person->telephone) }}">
    </p>
</div>

<div class="field">
    <label class="label" for="title">{{ __('Title') }}</label>
    <p class="control">
        <input type="text" class="input" name="title" id="title" value="{{ old('title', $person->title) }}">
    </p>
</div>

<div class="field">
    <label class="label" for="body">Biography</label>
    <p class="control">
        <markdown-textarea name="body" id="body" contents="{{ old('body', $person->body) }}"></markdown-textarea>
    </p>
</div>