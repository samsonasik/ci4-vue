Keyword: <input type="keyword" id="keyword" v-on:input="$this.search"/> <br /><br />

<table class="table">
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Link</th>
    </tr>

    <tr v-if="$this.data.portfolio.length == 0">
        <td colspan="3" class="text-center">No portfolio found.</td>
    </tr>

    <tr v-for="loop in $this.data.portfolio" :key="loop.id">
        <td>{{ loop.title }}</td>
        <td><img :src="`${ loop.image }`" /></td>
        <td><a v-bind:href="`${ loop.link }`">{{ loop.link }}</a></td>
    </tr>
</table>