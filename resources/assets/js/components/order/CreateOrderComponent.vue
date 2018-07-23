<template>
  
    <div class="box">
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
           <select class="select-aligned"  v-model="product.selects" :id="key" @change="addData(key)" >
                <option disabled value="" selected="">Please select one</option>
                <option v-for="(productstest, key) in products" :value="key">{{ productstest.name }}</option>
           </select>
          </div>
         </div>
        </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="price"> Product Price</label>
           <div class="control">
            <input class="input" :id="key" type="number" v-model="product.price" readonly>
           </div>
         </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="quantity_max">MAX Quantity</label>
           <div class="control">
            <input class="input"  :id="key" type="number" v-model="product.quantity_max" readonly>
           </div>
         </div>
       </div>
       <div class="column">
         <div class="field">
           <label class="label" for="quantity">Quantity</label>
           <div class="control">
            <input class="input"  :id="key" type="number" v-model="product.quantity" @change.prevent="sumPrice(key)" min="1">
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
    <div class="column" v-if="create">
     <div class="field">
       <label class="label" for="total_price">Total Price</label>
       <div class="control">
        <input class="input" type="number" v-model="total_price">
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
                total_price: "",
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
                        quantity_max: "",
                        
                    });
            },
            deleteSelect() 
            {
                if(this.addProduct.length != 1) 
                {
                    this.addProduct.pop();
                    this.totalPrice();
                }
            },

            addData: function(key) 
            {   
                var id = this.addProduct[key].selects;
                this.addProduct[key].price = this.products[id].price, 
                this.addProduct[key].quantity_max = this.products[id].quantity
                              
            },

            sumPrice(key) 
            {   
              this.addProduct[key].final_price = this.addProduct[key].price * this.addProduct[key].quantity,
              this.totalPrice();           
            },

            totalPrice()
            {   
                this.total_price = "";
                var x = this.addProduct.length;
                var i = 0;
                 for(i=0; i <= x; i++) {
                     this.total_price = parseFloat(this.total_price + this.addProduct[i].final_price)
                 }
            }

        }   
    }
</script>