const { h, compile } = Vue;

const createPage = (name, data = {}, inject = [], computed = {}, provide = null, methods = {}, hooks = {}) => Vue.defineComponent({
    name: 'page-' + name,
    data: () => Object.assign(
        {
            content: 'Loading...'
        },
        data
    ),
    inject: inject,
    computed: computed,
    provide: provide,
    methods: methods,
    mounted () {
        (new Promise( (resolve) => {
            fetch(
                this.$route.path,
                {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                }
            ).then(response =>  resolve(response.text()));
        })).then(result => this.content = result);
    },
    render() {
        const $this = this;
        return h(compile(`${this.content}`), { $this });
    },
    beforeCreate: hooks.beforeCreate ? hooks.beforeCreate : () => {},
    created: hooks.created ? hooks.created : () => {},
    beforeMount: hooks.beforeMount ? hooks.beforeMount : () => {},
    beforeUpdate: hooks.beforeUpdate ? hooks.beforeUpdate : () => {},
    updated: hooks.updated ? hooks.updated : () => {},
    beforeUnmount: hooks.beforeUnmount ? hooks.beforeUnmount : () => {},
    unmounted: hooks.unmounted ? hooks.unmounted : () => {},
    renderTracked : hooks.renderTracked  ? hooks.renderTracked  : () => {},
    renderTriggered: hooks.renderTriggered ? hooks.renderTriggered : () => {},
    activated: hooks.activated ? hooks.activated : () => {},
    deactivated: hooks.deactivated ? hooks.deactivated : () => {},
});

export default createPage;