Keyword: <input type="keyword" id="keyword" v-on:input="this.$parent.search" v-on:focus="this.$parent.search"/> <br /><br />

<table class="table">
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Link</th>
    </tr>

    <tr v-if="this.$parent.portfolio.length == 0">
        <td colspan="3" class="text-center">No portfolio found.</td>
    </tr>

    <tr v-for="loop in this.$parent.portfolio" :key="loop.id">
        <td>{{ loop.title }}</td>
        <td><img :src="`${ loop.image }`" /></td>
        <td><a v-bind:href="`${ loop.link }`">{{ loop.link }}</a></td>
    </tr>
</table>

<script type="application/javascript">
const store = new Vuex.Store({
    state: {
        portfolio : {}
    },
    mutations: {
        search (state, data) {
            sessionStorage.setItem('search-' + data.keyword, JSON.stringify(data.value));
            state.portfolio[data.keyword] = data.value;
        }
    }
});

document.querySelector('#keyword').focus();
</script>