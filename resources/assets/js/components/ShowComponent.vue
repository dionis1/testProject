<template>
  
   <div class="column box is-one-quarter">
      <h2 class="tile is-2">Title</h2>
       <ul v-for="product in products">
        <li>{{ product.name }}</li>
       </ul>
      <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'">
      </paginate>
     </div> 
   
</template>

<script>
    export default {
       data() {
            return {
                products: [],
                pageCount: 1,
                endpoint: 'api/product/show?page='
            };
        },

        created() {
            this.fetch();
        },
        mounted() {
            this.$root.$on('created', (data) => {
            this.fetch();
          })
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.products = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
          }
    }
</script>
