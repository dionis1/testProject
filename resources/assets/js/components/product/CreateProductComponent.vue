<template>
   <div class="column box">
      <!-- Edit Forme Start -->
      <form method="POST" @submit.prevent="onEdit(product.id)" v-if="edit">
         <div class="column">
            <strong>Edit!</strong> Now you can edit your product or
            go back to create page <a v-on:click="goToCreate" class="button is-primary is-rounded">Create</a>
         </div>
         <div class="columns is-mobile">
            <div class="column">
               <div class="field">
                  <label class="label" for="name">Name</label>
                  <div class="control">
                     <input class="input" id="name" type="text" v-model="product.name" >
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="field">
                  <label class="label" for="price">Price</label>
                  <div class="control">
                     <input class="input" id="price" v-model="product.price" type="number" >
                  </div>
               </div>
            </div>
         </div>
         <div class="columns is-mobile">
            <div class="column">
               <div class="field">
                  <label class="label" for="quantity">Quantity</label>
                  <div class="control">
                     <input class="input" id="quantity" v-model="product.quantity" type="number">
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="field">
                  <label class="label" for="location">Location</label>
                  <div class="select">
                     <select id="Location">
                        <option>Location 1</option>
                        <option>Location 2</option>
                        <option>Location 3</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="columns">
            <div class="column">
               <div class="field">
                  <label class="label" for="description">Description</label>
                  <div class="control">
                     <textarea  class="textarea" id="description" v-model="product.description" type="text"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="field is-grouped ">
            <div class="control">
               <button type="submit" class="button is-primary is-rounded">Save</button>
               <a v-on:click.prevent="onDelete(product.id)" class="button is-danger is-rounded">Delete</a>
            </div>
         </div>
      </form>
      <!-- Edit Forme End -->
      <!-- Create Forme Start -->
      <form method="POST" @submit.prevent="onCreate" v-if="create">
         <div class="columns is-mobile">
            <div class="column">
               <div class="field">
                  <label class="label" for="name">Name</label>
                  <div class="control" :class="{'has-error': errors.name}">
                     <input class="input" id="name" v-model="product.name" type="text" placeholder="Name">
                     <span v-if="errors.name" class="notification is-danger is-danger">{{ errors.name[0] }}</span>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="field">
                  <label class="label" for="price">Price</label>
                  <div class="control" :class="{'has-error': errors.price}">
                     <input class="input" id="price" v-model="product.price" type="number" placeholder="Price">
                     <span v-if="errors.price" class="notification is-danger is-danger">{{ errors.price[0] }}</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="columns is-mobile">
            <div class="column">
               <div class="field">
                  <label class="label" for="quantity">Quantity</label>
                  <div class="control" :class="{'has-error': errors.quantity}">
                     <input class="input" id="quantity" v-model="product.quantity" type="number" placeholder="Quantity">
                     <span v-if="errors.quantity" class="notification is-danger is-danger">{{ errors.quantity[0] }}</span>
                  </div>
               </div>
            </div>
            <div class="column">
               <div class="field">
                  <label class="label" for="location">Location</label>
                  <div class="select">
                     <select id="Location">
                        <option>Location 1</option>
                        <option>Location 2</option>
                        <option>Location 3</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="columns">
            <div class="column">
               <div class="field">
                  <label class="label" for="description">Description</label>
                  <div class="control" :class="{'has-error': errors.description}">
                     <textarea  class="textarea" id="description" v-model="product.description" type="text" placeholder="Description"></textarea>
                     <span v-if="errors.description" class="notification is-danger is-danger">{{ errors.description[0] }}</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="field is-grouped">
            <div class="control ">
               <button type="submit" class="button is-primary is-rounded">Create</button>
            </div>
         </div>
      </form>
      <!-- Create Forme End -->
   </div>
</template>
<script>
   export default {
      data() {
           return {
               errors: [],
               create: true,
               edit: false,
               product: {
                   id:null,
                   name: null,
                   description: null,
                   price: null,
                   quantity: null,
               }
           };
       },
       mounted() {
           this.$root.$on('data', (data) => {
           
           this.product.id=data.id,
           this.product.name=data.name,
           this.product.description= data.description,
           this.product.price= data.price,
           this.product.quantity= data.quantity,
   
           this.create = false;
           this.edit = true;
         })
       },
       methods: {
           onCreate() {
              axios.post('api/product', this.product)
                   .then(({data}) => this.setSuccessMessage(data))
                   .catch(({response}) => this.setErrors(response));
           },
           setErrors(response) 
           {
               this.errors = this.response.data.errors;
               
           },

           setSuccessMessage(data) {
               this.$root.$emit('created', data);
               Vue.swal(
                   'Product is successfully created!',
                   'Good job!',
                   'success'
                   );
               this.reset();
               
           },
           reset() {
               this.errors = [];
               this.product = {name: null, description: null, price: null, quantity: null};
           },
           goToCreate() {
            this.create = true;
            this.edit = false;
            this.reset();
           },
   
           onEdit(id) {
             axios.post('api/product/' + id, this.product)
                   .then(({data}) => this.setEditSuccessMessage(data))
                   .catch(({response}) => this.setEditErrors(response));
           },
           setEditSuccessMessage(data) {
               this.$root.$emit('created', data);
               Vue.swal(
                   'Product is successfully Edited!',
                   'Good job!',
                   'success'
                   );
           },
           setEditErrors(response) {
               Vue.swal(
                   this.response.data.errors,
                   'Error',
                   'error'
                   );
               
           },
           onDelete(id) {
   
               Vue.swal({
                     title: 'Are you sure?',
                     text: "You won't be able to revert this!",
                     type: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#3085d6',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Yes, delete it!'
                   }).then((result) => {
                     if (result.value) {
                       axios.post('api/product/delete/' + id)
                           .then(({data}) => this.setDeleteSuccessMessage(data))
                           .catch(({response}) => this.setDeleteErrors(response));
                     }
                   });
           },
           setDeleteSuccessMessage(data) {
               this.goToCreate();
               this.$root.$emit('created', data);
               Vue.swal(
                     'Deleted!',
                     'Your file has been deleted.',
                     'success'
                   );
           },
           setDeleteErrors(response) {
               Vue.swal(
                   this.response.data.errors,
                   'Error',
                   'error'
                   );
               
           },
       }
   }
</script>