
   <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                 <div class="col-md-6" > 
               
                  <h3>Create New Products</h3> 
                <form @submit.prevent="addProduct(product)" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Product Name:</label>
                    <input type="text" class="form-control" v-model="product.name" required>
                </div>

                <div class="form-group">
                    <label for="email">Product SKU:</label>
                    <input type="text" class="form-control" v-model="product.sku" required>
                </div>
                 <div class="form-group">
                     <label for="email">Product Category:</label> <br>
                <select v-model="product.category_id">
                    <option disabled value="">select category</option>
                    <option v-for="(category, index) in categories" :key="index" v-bind:value="category.id" >
                        {{category.name}}
                    </option>
                   
                </select>
                </div>
                <div class="form-group">
                    <label for="email">Product Price:</label>
                    <input type="number" class="form-control" v-model="product.price">
                </div>
                <div class="form-group">
                    <label for="email">Product Quantity:</label>
                    <input type="number" class="form-control" v-model="product.quantity">
                </div>

                <div class="form-group">
                    <label for="email">Product Cover:</label>
                    <input type="file" class="form-control"  v-on:change="imageChange">
                </div>

                 <div class="form-group">
                    <label for="email">Product Description:</label>
                   
                    <textarea class="form-control" v-model="product.description" placeholder="add a description"></textarea>
                </div>

               
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
                <div class="col-md-6">
                    
                   <h3>List Product</h3>
                     <p v-if="!products.length">There are no categories yet create a new category.</p>         
                    <table v-if="products.length" class="table table-striped" style="padding-top:10px;">
                        <thead>
                        <tr>
                            <th> Name</th>
                             <th> Price</th>
                              <th> Qty</th>
                            <th></th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product, index) in products" :key="index">
                            <td>{{ product.name}}</td>
                             <td>{{ product.price}}</td>
                              <td>{{ product.quantity}}</td>
                            <td><button type="button" v-on:click="removeProduct(product)" class="btn btn-danger">DELETE</button>
                            </td>
                            
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
           </div>
            </div>
        
    </template>
    <script> 
   
     import {mapGetters} from 'vuex'

        export default { 

                data() {
                        return {
                            product: {
                                name: '',
                                sku: '',
                                description: '',
                                quantity:'',
                                price:'',
                                cover:'',
                                category_id:''
                            }
                           
                        }
                        },
            
         

             props : ['title'],

            mounted() {
                this.$store.dispatch('fetchProducts')
                 this.$store.dispatch('fetchCategories')
            }, 

            methods: { 
                             addProduct(products) { 
                                 let currentObj = this;
 
                                    const config = {
                                        headers: { 'content-type': 'multipart/form-data' }
                                    }
                    
                                    let formData = new FormData();
                                    formData.append('product', this.image);
                                 this.$store.dispatch('createProduct', products)
                                
                                },
                                
                                removeProduct(product) { 
                                this.$store.dispatch('deleteProduct', product)
                               
                                },

                                imageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.product.cover = e.target.result;
                };
                reader.readAsDataURL(file);
            },
                                       
            },

               computed: {
                ...mapGetters([
                    'products',
                    'categories'
                ])
            }
                  
        }
    </script>
    <style scoped>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 80;
           /* height: 100vh; */
            margin: 0;
        }

     /*   .full-height {
            height: 100vh; 
        }  */

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: left;
            padding-bottom: 60px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>