<template>
    <div class="modal is-active" v-if="isActive">
        <div class="modal-background" @click="cancel"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Add a Participant</p>
            </header>
            <form method="post" :action="post_url">
                <input type="hidden" name="_token" :value="csrf_token">
                <section class="modal-card-body">
                    <div class="field">
                        <label class="label">People</label>
                        <p class="control">
                            <span class="select">
                                <select name="person">
                                    <option value="">Select a person</option>
                                    <option v-for="person in people" :value="person.id">{{ person.name }}</option>
                                </select>
                            </span>
                        </p>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" type="submit">Add</button>
                </footer>
            </form>
        </div>
        <button class="modal-close" @click="cancel"></button>
    </div>
</template>

<script>
    export default {
        props: ['active', 'people', 'post_url', 'csrf_token'],
        mounted() {
            console.log(this.post_url);
        },
        data() {
            return {
                isActive: this.active || false
            }
        },
        watch: {
            active(value) {
                this.isActive = value
            }
        },
        methods: {
            cancel() {
                this.close()
            },
            close() {
                this.$emit('close');
                this.$emit('update:active', false);
            },
            keyPress(event) {
                // Esc key
                if (event.keyCode === 27) this.cancel()
            },
            postForm() {

            }
        },
        created() {
            if (typeof window !== 'undefined') {
                document.addEventListener('keyup', this.keyPress)
            }
        },
        beforeDestroy() {
            if (typeof window !== 'undefined') {
                document.removeEventListener('keyup', this.keyPress)
            }
        }
    }
</script>
