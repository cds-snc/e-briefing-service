
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.marked = require('marked');

marked.setOptions({
    breaks: true
});

/**
 * Lang Helper
 */
Vue.prototype.__ = (string, args) => {
    var lang = 'en';

    if(_.has(window.i18n, lang)) {
        let value = _.get(window.i18n[lang], string);

        if(value) {
            _.eachRight(args, (paramVal, paramKey) => {
                value = _.replace(value, `:${paramKey}`, paramVal);
            });
            return value;
        }
        return string;
    }
    return string;
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('add-participant-modal', require('./components/AddParticipantModal.vue'));
Vue.component('add-contact-modal', require('./components/AddContactModal.vue'));
Vue.component('add-document-modal', require('./components/AddDocumentModal.vue'));
Vue.component('markdown-textarea', require('./components/MarkdownTextarea.vue'));

const app = new Vue({
    el: '#app',
    data: {
        isParticipantModalActive: false,
        isContactModalActive: false,
        isDocumentModalActive: false
    }
});
