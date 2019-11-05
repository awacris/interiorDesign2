
  <template>
       
                  <div class="col-md-6" > 
               
                  <h3>Create New Category</h3> 
                <form @submit.prevent="onSubmit" style="padding-top:10px;"> 
 
                <div class="form-group">
                    <label for="email">Category Name:</label>
                    <input type="text" class="form-control" v-model="category.name">
                </div>

                 <div class="form-group">
                    <label for="email">Category Description:</label>
                    <input type="text" class="form-control" v-model="category.description">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
                </form> 

                
                </div> 
              
        
    </template>
    <script>
        export default {

            

                data() {
                        return {
                            category: {
                                name: '',
                                description: ''
                            }
                           
                        }
                        },

               methods:{   onSubmit() {
                            let categories = {
                                name: this.category.name,
                                description: this.category.description,
                            }
                           this.$emit('category-create', categories)
                            this.category.name = null
                             this.category.description = null
                           
                            } 
               }
        }
    </script>
    