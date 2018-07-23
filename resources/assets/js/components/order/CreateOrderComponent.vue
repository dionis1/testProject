<template>
  
    <div class="box">
    <!--
      <form>
        <div class="columns">
            <div class="column">
                <div class="field" >
                    <div class="is-flex flex-wrap">
                        <label class="label" for="product">Products</label>
                        <div class="tags has-addons is-block">
                            <span class="btn tag" v-on:click="addSelect" ><i class="fas fa-plus"></i></span>
                            <span class="btn tag is-info" v-on:click="deleteSelect" ><i class="far fa-trash-alt"></i></span>
                        </div>
                    </div>
                    <div class="select-aligned" v-for="(select, key) in selects" :key="key">
                        <div class="selects" >
                            <div class="select">
                                <select id="product" v-model="order.product[key]">
                                    <option :value="undefined"></option>
                                    <option v-for="product in products" :key="product.id">{{product.name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
          <button type="submit" class="button is-primary is-rounded">Save</button>
         </div>
        </div>
      </form>
    
    -->
    <div class="column">
    <div class="is-flex flex-wrap">
     <label class="label" for="product">Products Order</label>
     <div class="tags has-addons is-block">
       <span class="btn tag" v-on:click="addProducts" ><i class="fas fa-plus"></i></span>
       <span class="btn tag is-info" v-on:click="deleteSelect" ><i class="far fa-trash-alt"></i></span>
     </div>
    </div>
    </div>
     
     <div v-for="(product, key) in addProduct">
       <div class="columns">
       <div class="column">
        <div class="field">
         <div class="selects">
          <div class="select">
           <select class="select-aligned"  :id="key" v-model="product.selects" v-for="productstest in products" @change="addThing($event, productstest)">
                <option>{{ productstest.name }}</option>
           </select>
          </div>
         </div>
        </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="price"> Product Price</label>
           <div class="control">
            <input class="input" :id="key" type="number" v-model="product.price[key]">
           </div>
         </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="quantity">Quantity</label>
           <div class="control">
            <input class="input"  :id="key" type="number" v-model="product.quantity">
           </div>
         </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="final_price">Final Price</label>
           <div class="control">
            <input class="input" :id="key" type="number" v-model="product.final_price">
           </div>
         </div>
       </div>
     </div>
    </div>
    <div class="field is-grouped " v-if="create">
     <div class="control">
      <button class="button is-primary is-rounded">Create a Order</button>
     </div>
    </div>
   </div>
</template>

<script>
    export default {
       data() {
            return {
                create: false,
                errors: [],
                addProduct: [],
                products: [],
            }
        },
        created()  {
            this.getProducts();
        },
        methods: {
            getProducts(){
                let products;
                axios.get('api/product/show')
                .then(data => {
                    products = data.data.data
                    for(var prod in products) {
                        this.products.push(products[prod]);
                    }
                              
                })
                .catch(errors => {
                    Vue.swal(
                    'Something went wrong with product',
                    'Error!',
                    'error'
                    );
                });                
            },


            addProducts: function()
            {
                this.create = true;
                this.addProduct.push({
                        selects: "",
                        price: "",
                        quantity: "",
                        final_price: "",
                        
                    });
            },
            deleteSelect() 
            {
                if(this.addProduct.length != 1) 
                {
                    this.addProduct.pop();
                }
            },

            addThing: function(event, row) 
            {   
                console.log(key);

                this.addProduct.price = productstest.price               
            }

        }   
    }
</script>