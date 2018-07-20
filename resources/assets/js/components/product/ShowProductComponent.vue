<template>
   <div class="column box is-one-quarter">
      <h2 class="tile"><strong class="has-text-centered">Titles</strong></h2>
      <hr class="tile-margins">
      <ul v-for="product in products" class="has-text-centered" :key="product.id">
         <li v-on:click="edit(product)">{{ product.name }}</li>
      </ul>
      <hr class="tile-margins">
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
                   .then(({data})=> this.setSuccessMessage(data))
                   .catch(({response}) => this.showErrors(response));
           },
           edit(data){
             this.$root.$emit('data',data);
           },
   
           setSuccessMessage(data) {
               this.products = data.data;
               this.pageCount = data.meta.last_page;
           },
           showErrors(response) {
               Vue.swal(
                   this.response.data.errors,
                   'Error',
                   'error'
                   );
           },
       }
   }
</script>