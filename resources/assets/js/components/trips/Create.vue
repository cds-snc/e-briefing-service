<template>
    <form action="" method="POST">
        <input type="hidden" name="id">

        <div class="field">
            <label class="label" for="name">{{ __('Trip name') }}</label>
            <p class="control">
                <input type="text" class="input" name="name" id="name" placeholder="">
            </p>
        </div>
        <div class="field">
            <label class="label" for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="textarea"></textarea>
        </div>

        <button type="submit" class="button is-primary">Submit</button>
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('Create Component mounted.');
        }
    }
</script>