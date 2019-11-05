
  <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                
                 <Categoryform @category-create="addCategory"></Categoryform>

                <div class="col-md-6">
                   <h3>List Category</h3>
                     <p v-if="!categories.length">There are no categories yet create a new category.</p>         
                    <table v-if="categories.length" class="table table-striped" style="padding-top:10px;">
                        <thead>
                        <tr>
                            <th> Name</th>
                            <th></th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category, index) in categories" :key="index">
                            <td>{{ category.name}}</td>
                            <td><button type="button" v-on:click="removeCategory(category)" class="btn btn-danger">DELETE</button>
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
    import Categoryform from './Categoryform.vue'
     import {mapGetters} from 'vuex'

        export default { 
            
            components: { 
                           Categoryform,
            },

             props : ['title'],

            mounted() {
                this.$store.dispatch('fetchCategories')
            }, 

            methods: { addCategory(categories) { 
                                 this.$store.dispatch('createCategory', categories)
                                
                                },
                                
                                removeCategory(category) { 
                                this.$store.dispatch('deleteCategory',category)
                               
                                } 
            },

               computed: {
                ...mapGetters([
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