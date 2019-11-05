
  <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                 <div class="col-md-6" > 
               
                  <h3>Create Combinations for products</h3> 
                <form @submit.prevent="addCombination(combination)" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Product Name:</label>
                   
                    <select @change="onChange($event)"  v-model="combination.product_id">
                    <option disabled value="">Please select one</option>
                    <option v-for="(product, index) in products" :key="index" v-bind:value="product.id" >
                        {{product.name}}
                    </option>
                   
                    </select>
                </div> 
                     
                 <div class="form-group" v-for="(option_value, index) in combinationValues" :key="index">
                   
                    <input type="checkbox"  v-model="combination.selected_option_values" :value="option_value.id">
                    <label>{{option_value.value}}</label><br>
                   
                </div>

                 <div class="form-group">
                    <label for="email">Product Price:</label>
                    <input type="number" class="form-control" v-model="combination.price">
                </div>
                <div class="form-group">
                    <label for="email">Product Quantity:</label>
                    <input type="number" class="form-control" v-model="combination.qty">
                </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
                <div class="col-md-6">
                    
                   <h3>combinations</h3>
                             
                    <table v-for="(combination, index) in combinations" :key="index" class="table table-striped" style="padding-top:10px;">
                        <thead >
                        <tr>
                            <th>Product_id {{combination.id}}</th>
                           
                             <th> </th>
                           
                        </tr>
                        </thead>
                        <tbody>
                            
                        <tr v-for="(option, index) in combination.product_option" :key="index">
                            
                             <td>{{ option.value}}</td>
                            <td><button type="button" v-on:click="removeProductOption(combination)" class="btn btn-danger">DELETE</button>
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
                            combination: {
                                option_id: [],
                                product_id: '',
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
                this.$store.dispatch('fetchCombinations')
                
            }, 

            methods: { 
                             addCombination(combination) { 
                                 this.$store.dispatch('createCombination', combination)
                                
                                },
                                
                                removeProductOption(combination) { 
                                this.$store.dispatch('deleteCombination', combination)
                               
                                },

                                currentOption(options, option_id) {
                                          
                                            for (var i=0, iLen=options.length; i<iLen; i++) {

                                                    if (options[i].id == option_id) return options[i].name;
                                                }
                                          

                                     },

                                      onChange(event) { 

                                                         

                                                       this.$store.dispatch('fetchCombinationValues', event.target.value)
                                                        
                                                        }
            },

               computed: {
                ...mapGetters([
                    'productoptions',
                    'products',
                    'options',
                    'combinations',
                    'combinationValues'
                   
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