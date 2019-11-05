
  <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                 <div class="col-md-6" > 
               
                  <h3>Create New Options</h3> 
                <form @submit.prevent="addOption(option)" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Option Name:</label>
                    <input type="text" class="form-control" v-model="option.name">
                </div>

               
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
                <div class="col-md-6">
                   <h3>List Option</h3>
                     <p v-if="!options.length">There are no categories yet create a new category.</p>         
                    <table v-if="options.length" class="table table-striped" style="padding-top:10px;">
                        <thead>
                        <tr>
                            <th> Name</th>
                            <th></th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(option, index) in options" :key="index">
                            <td>{{ option.name}}</td>
                            <td><button type="button" v-on:click="removeOption(option)" class="btn btn-danger">DELETE</button>
                            <button type="button" class="btn btn-warning">UPDATE</button> </td>
                            
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
                            option: {
                                name: ''
                               
                            }
                           
                        }
                        },
            
         

             props : ['title'],

            mounted() {
                this.$store.dispatch('fetchOptions')
            }, 

            methods: { 
                             addOption(options) { 
                                 this.$store.dispatch('createOption', options)
                                
                                },
                                
                                removeOption(option) { 
                                this.$store.dispatch('deleteOption', option)
                               
                                } 
            },

               computed: {
                ...mapGetters([
                    'options'
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