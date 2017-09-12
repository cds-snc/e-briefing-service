<div class="field">
    <label class="label" for="title">{{ __('Title') }} (required)</label>
    <div class="control">
        <input type="text" class="input" name="title" id="title" value="{{ old('title', $event->title) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="type">{{ __('Type') }}</label>
    <div class="control">
        <input type="text" class="input" name="type" id="type" value="{{ old('type', $event->type) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="time_from">{{ __('Time from') }} (required)</label>
    <div class="control">
        <input type="time" class="input" name="time_from" id="time_from" value="{{ old('time_from', $event->time_from) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="time_to">{{ __('Time to') }}</label>
    <div class="control">
        <input type="time" class="input" name="time_to" id="time_to" value="{{ old('time_to', $event->time_to) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="location_name">{{ __('Location name') }} (required)</label>
    <div class="control">
        <input type="text" class="input" name="location_name" id="location_name" value="{{ old('location_name', $event->location_name) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="location_address">{{ __('Address') }}</label>
    <div class="control">
        <input type="text" class="input" name="location_address" id="location_address" value="{{ old('location_address', $event->location_address) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="location_postal">{{ __('Postal') }}</label>
    <div class="control">
        <input type="text" class="input" name="location_postal" id="location_postal" value="{{ old('location_postal', $event->location_postal) }}">
    </div>
</div>

<div class="field">
    <label class="label" for="description">Brief Description</label>
    <div class="control">
        <markdown-textarea name="description" id="description" contents="{{ old('description', $event->description) }}"></markdown-textarea>
    </div>
</div>

<div class="field">
    <label class="label" for="body">Body</label>

    <div class="control">
        <markdown-textarea name="body" id="body" contents="{{ old('body', $event->body) }}"></markdown-textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <label class="checkbox">
            {{ Form::checkbox('is_meal', 1, $event->is_meal) }}
            Is a meal?
        </label>
    </div>
</div>