<template>
    <div class="modal is-active" v-if="isActive">
        <div class="modal-background" @click="cancel"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Add a Participant</p>
            </header>
            <section class="modal-card-body">
                dddd
            </section>
            <footer class="modal-card-foot">
                <a class="button is-success">Add</a>
            </footer>
        </div>
        <button class="modal-close" @click="cancel"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['active'],
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
