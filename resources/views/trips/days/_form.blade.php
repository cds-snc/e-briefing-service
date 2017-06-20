<div class="field">
    <label class="label" for="name">{{ __('Name') }}</label>
    <p class="control">
        <input type="text" class="input" name="name" id="name" value="{{ old('name', $day->name) }}">
    </p>
</div>
<div class="field">
    <label class="label" for="date">{{ __('Date') }}</label>
    <p class="control">
        <input type="date" class="input" name="date" value="{{ old('date', $day->date) }}">
    </p>
</div>