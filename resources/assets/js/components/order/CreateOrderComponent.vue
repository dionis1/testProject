<template>
  
    <div class="box">
        <form v-on:submit="onSubmit">

        <div class="columns is-mobile">
           <!-- Qetu eshte Problem duhet me bah ajax call sa here te ndryshon me VueJS -->
            <div class="column">
                <div class="field">
                    <label class="label" for="product">Product</label>
                    <div class="select">
                      <select id="product" v-model="order.product">                        
                        <option v-for="product in products" :key="product.id">{{product.name}}</option>
                      </select>
                    </div>
                </div>
            </div>
            <!-- deri qetu vjen -->
            <div class="column">
                <div class="field">
                <label class="label" for="price"> Product Price</label>
                    <div class="control">
                        <input class="input" id="price" v-model="order.price" type="number" placeholder="Product Price">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label" for="quantity">Quantity</label>
                    <div class="control">
                        <input class="input" id="quantity" v-model="order.quantity" type="number" placeholder="Quantity">
                    </div>
                </div>
            </div>
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
                order: {
                    product: null,
                    price: null,
                    quantity: null,
                },
                products: [],
                submitClick: true
            }
        },
        created()  {
            this.getProducts();
        },
        methods: {
            getProducts(){
                axios.get('api/product/show')
                .then(data => {
                    const products = data.data.data;
                    for(var prod in products) {
                        this.products.push(products[prod]);
                    }
                })
                .catch(errors => {
                    Vue.swal(
                    'Something went wrong with product',
                    'Erro!',
                    'error'
                    );
                })
            },
            onSubmit() {

            }
        }   
    }
</script>
