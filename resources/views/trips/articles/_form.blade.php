<div class="field">
    <label class="label" for="title">{{ __('Title') }}</label>
    <p class="control">
        <input type="text" class="input" name="title" id="title" value="{{ old('title', $article->title) }}">
    </p>
</div>

<div class="field">
    <label class="label" for="body">Body</label>
    <p class="control">
        <markdown-textarea name="body" id="body" contents="{{ old('body', $article->body) }}"></markdown-textarea>
    </p>
</div>