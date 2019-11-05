
  <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                 <div class="col-md-6" > 
               
                  <h3>Create New Options</h3> 
                <form @submit.prevent="addProductOption(productOption)" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Product Name:</label>
                   
                    <select   v-model="productOption.product_id">
                    <option disabled value="">Please select one</option>
                    <option v-for="(product, index) in products" :key="index" v-bind:value="product.id" >
                        {{product.name}}
                    </option>
                   
                    </select>
                </div> 

                 <div class="form-group">
                    <label for="email">Options:</label>
                   
                    <select @change="onChange($event, productoptions)" v-model="productOption.option_id">
                    <option disabled value="">Please select one</option>
                    <option v-for="(option, index) in options" :key="index" v-bind:value="option.id" >
                        {{option.name}}
                    </option>
                    </select>

                </div>
                <div class="form-group" v-for="(option_value, index) in productOption.option_values" :key="index">
                   
                    <input type="checkbox"  v-model="productOption.selected_option_values" :value="option_value.id">
                    <label>{{option_value.value}}</label><br>
                   
                </div>
               
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
                <div class="col-md-6">
            
                   <h3>Products/Options</h3>
                           
                    <table v-for="(product, index) in products" :key="index" class="table table-striped" style="padding-top:10px;">
                        <thead v-if="product.option.length">
                        <tr>
                            <th> {{product.name}}</th>
                           
                             <th> </th>
                           
                        </tr>
                        </thead>
                        <tbody>
                            
                        <tr v-for="(option, index) in product.option" :key="index">
                            
                             <td>{{ option.value}}</td>
                            <td><button type="button" v-on:click="removeProductOption(product, option.id)" class="btn btn-danger">DELETE</button>
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
                            productOption: {
                                option_id: [],
                                product_id: '',
                                options_id:'',
                                option_values: [],
                                selected_option_values: [],
                                price: '',
                                qty: ''
                               
                            }
                           
                        }
                        },
            
         

             props : ['title'],

            mounted() {

                 this.$store.dispatch('fetchProducts')
                this.$store.dispatch('fetchProductOptions')
                this.$store.dispatch('fetchOptions')
                
            }, 

            methods: { 
                             addProductOption(productoptions) { 
                                 this.$store.dispatch('createProductOption', productoptions)
                                 this.$store.dispatch('fetchProducts')
                                
                                },
                                
                                removeProductOption(product, option) { 
                                         
                                  this.productOption.options_id = option 
                                  this.productOption.product_id = product.id       
                                this.$store.dispatch('deleteProductOption', product, this.productOption)
                                  this.$store.dispatch('fetchProducts')
                               
                                },

                                currentOption(options, option_id) {
                                          
                                            for (var i=0, iLen=options.length; i<iLen; i++) {

                                                    if (options[i].id == option_id) return options[i].name;
                                                }
                                          

                                     },

                                      onChange(event, productoptions) { 

                                                           this.productOption.option_values=[]
                                                             for (var i=0, iLen=productoptions.length; i<iLen; i++) {

                                                                if (productoptions[i].option_id == event.target.value) 
                                                                this.productOption.option_values.push(productoptions[i]);
                                                            }
                                                        
                                                        }
            },

               computed: {
                ...mapGetters([
                    'productoptions',
                    'products',
                    'options'
                ]),

                
            }
                  
        }
    </script>
    <style scoped>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 80;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

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