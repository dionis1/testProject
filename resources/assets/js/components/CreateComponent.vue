<template>
  
    <div class="column box">
        <!-- <div class="field is-grouped level">
         <div class="control level-right">
          <button class="button is-primary level-item"> + Create</button>
         </div>
        </div> -->
        <form method="POST" @submit.prevent="onSubmit">
        <div class="field">
           <label class="label">Name</label>
           <div class="control" :class="{'has-error': errors.name}">
              <input class="input" id="name" v-model="product.name" type="text" placeholder="Name">
               <span v-if="errors.name" class="notification is-danger is-danger">{{ errors.name[0] }}</span>
           </div>
           <p class="help">This is a help text</p>
        </div>
        <div class="field">
           <label class="label">Description</label>
           <div class="control" :class="{'has-error': errors.description}">
              <textarea  class="textarea" id="description" v-model="product.description" type="text" placeholder="Description"></textarea>
              <span v-if="errors.description" class="notification is-danger is-danger">{{ errors.description[0] }}</span>
           </div>
           <p class="help">This is a help text</p>
        </div>
        <div class="field">
           <label class="label">Price</label>
           <div class="control" :class="{'has-error': errors.price}">
              <input class="input" id="price" v-model="product.price" type="number" placeholder="Price">
              <span v-if="errors.price" class="notification is-danger is-danger">{{ errors.price[0] }}</span>
           </div>
           <p class="help">This is a help text</p>
        </div>
        <div class="field">
           <label class="label">Quantity</label>
           <div class="control" :class="{'has-error': errors.quantity}">
              <input class="input" id="quantity" v-model="product.quantity" type="number" placeholder="Quantity">
              <span v-if="errors.quantity" class="notification is-danger is-danger">{{ errors.quantity[0] }}</span>
           </div>
           <p class="help">This is a help text</p>
        </div>
        <div class="field is-grouped ">
         <div class="control level-right">
          <button type="submit" class="button is-success level-item">Save</button>
         </div>
        </div>
        </form>
     </div>
   
</template>

<script>
    export default {
       data() {
            return {
                errors: [],
                product: {
                    name: null,
                    description: null,
                    price: null,
                    quantity: null,
                }
            };
        },
        methods: {
            onSubmit() {
               console.log('onSubmit');
               axios.post('api/product', this.product)
                    .then(({data}) => this.setSuccessMessage(data))

                    .catch(({response}) => this.setErrors(response));
            },
            setErrors(response) {
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
            }
        }
    }
</script>
