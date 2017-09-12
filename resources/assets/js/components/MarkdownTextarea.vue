<template>
    <div class="markdown-editor">
        <div class="markdown-editor-header">Style using <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>
            <span class="markdown-editor-options">
                <a @click="showPreview" v-if="!preview">
                    <span class="icon is-small">
                        <i class="fa fa-eye"></i>
                    </span> Preview
                </a>
                <a @click="hidePreview" v-if="preview">
                    <span class="icon is-small">
                        <i class="fa fa-times"></i>
                    </span> Cancel
                </a>
            </span>
        </div>
        <div class="markdown-editor-preview" v-if="preview">
            <div v-html="compiled"></div>
        </div>
        <textarea class="textarea" :name="name" :id="id" @input="update">{{ contents }}</textarea>
    </div>
</template>

<script>
    export default {
        props: ['name', 'id', 'contents'],
        mounted() {

        },
        data() {
            return {
                input: this.contents,
                preview: false
            }
        },
        computed: {
            compiled: function() {
                return marked(this.input, { sanitize: true })
            }
        },
        methods: {
            update: _.debounce(function(e) {
                this.input = e.target.value
            }, 300),

            showPreview: function() {
                this.preview = true;
            },

            hidePreview: function() {
                this.preview = false;
            }
        }
    }
</script>

<style lang="scss">
    .markdown-editor {
        position: relative;

        .markdown-editor-header {
            position: absolute;
            z-index: 50;
            width: 100%;
            height: 2em;
            background-color: #eee;
            padding: 3px 6px;
            font-size: .8em;
            .markdown-editor-options {

                a {
                    margin-left: 1em;
                }
            }
        }
        textarea {
            padding-top: 2em;
            height: 300px;
        }
        .markdown-editor-preview {
            padding: 2em 9px;
            position: absolute;
            width: 100%;
            border: 1px solid blue;
            left: 0;
            background: #fff;
            height: 100%;
            z-index: 49;
            overflow: scroll;
        }
    }
</style>