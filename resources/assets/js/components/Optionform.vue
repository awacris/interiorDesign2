
   <template>
       
                  <div class="col-md-6" > 
               
                  <h3>Create New Options</h3> 
                <form @submit.prevent="onSubmit" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Option Name:</label>
                    <input type="text" class="form-control" v-model="option.name">
                </div>

               
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
              
        
    </template>
    <script>
        export default {

            

                data() {
                        return {
                            option: {
                                name: ''
                               
                            }
                           
                        }
                        },

               methods:{   onSubmit() {
                            let options = {
                                name: this.option.name,
                                
                            }
                           this.$emit('option-create', options)
                            this.option.name = null
                             
                           
                            } 
               }
        }
    </script>
    