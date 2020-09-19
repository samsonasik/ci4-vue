const { h, compile } = Vue;

const createPage = (name, data = {}, methods = {}, updated = () => {}) => Vue.defineComponent({
    name: 'page-' + name,
    data: () => Object.assign(
        {
            content: 'Loading...'
        },
        {
            data
        }
    ),
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
    updated: updated
});

export default createPage;