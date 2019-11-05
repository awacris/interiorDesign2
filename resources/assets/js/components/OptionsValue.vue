
  <template>
        <div class="flex-cente position-re full-heigh">
            <div class="content"> 
                <label class="flex-center" style="padding:10px;"> <h2> {{title}} </h2></label>
                 <div class="row"> 
                 <div class="col-md-6" > 
               
                  <h3>Create New Options Values</h3> 
                <form @submit.prevent="addOptionValue(optionvalue)" style="padding-top:10px;"> 
                 <div class="form-group">
                <select v-model="optionvalue.option_id">
                    <option disabled value="">Select Option</option>
                    <option v-for="(option, index) in options" :key="index" v-bind:value="option.id" >
                        {{option.name}}
                    </option>
                   
                </select>
                </div>
                <div class="form-group">
                    <label for="email">Option Value:</label>
                    <input type="text" class="form-control" v-model="optionvalue.value">
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
                            <th> Option_Type</th>
                            <th>Value</th>
                            <th></th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(optionvalue, index) in optionValues" :key="index">
                            <td>{{ currentOption(options, optionvalue.option_id)}}</td>
                            <td>{{ optionvalue.value}}</td>
                             
                            <td><button type="button" v-on:click="removeOptionValue(optionvalue)" class="btn btn-danger">DELETE</button>
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
                            optionvalue: {
                                value: '',
                                option_id:''
                               
                            }
                           
                        }
                        },
            
         

             props : ['title'],

            mounted() {
                this.$store.dispatch('fetchOptions')
                 this.$store.dispatch('fetchOptionValues')
            }, 

            methods: { 
                             addOptionValue(optionvalue) { 
                                 this.$store.dispatch('createOptionValue', optionvalue)
                                
                                },
                                
                                removeOptionValue(optionvalue) { 
                                this.$store.dispatch('deleteOptionValue', optionvalue)
                               
                                },
                                
                                currentOption(options, option_id) {
                                          
                                            for (var i=0, iLen=options.length; i<iLen; i++) {

                                                    if (options[i].id == option_id) return options[i].name;
                                                }
                                          

                                     }
            },

               computed: {
                ...mapGetters([
                    'options',
                    'optionValues'
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