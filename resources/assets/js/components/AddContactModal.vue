<template>
    <div class="modal is-active" v-if="isActive">
        <div class="modal-background" @click="cancel"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Add a Contact</p>
            </header>
            <form method="post" :action="'/events/' + event + '/contacts'">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="_token" :value="csrf_token">
                <section class="modal-card-body">
                    <div v-if="people.length > 0" class="field">
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
                    <div v-else class="notification is-warning">
                        There are no people available.
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button v-if="people.length > 0" class="button is-success" type="submit">Add</button>
                    <button v-else class="button" @click="cancel">Cancel</button>
                    <a :href="'/events/' + event + '/contacts/create'" class="button">Create a new Person</a>
                </footer>
            </form>
        </div>
        <button class="modal-close" @click="cancel"></button>
    </div>
</template>

<script>
    export default {
        props: ['active', 'event', 'csrf_token'],
        mounted() {
            axios.get('/api/events/' + this.event + '/contacts/available')
                .then((response) => {
                    this.people = response.data;
                });
        },
        data() {
            return {
                isActive: this.active || false,
                people: []
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