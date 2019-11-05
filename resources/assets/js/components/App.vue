
  <template>
                        
                <div class="container">
                <div class="sidenav" id="sidebar">
                <div class="itemclass active">
                <router-link :to="{ name: 'category' }"><a  href="#about">Category</a></router-link>
                </div>
                <div class="itemclass">
                 <router-link :to="{ name: 'options' }"><a  href="#about">Options</a></router-link>
                </div>
                <div class="itemclass"> 
                 <router-link :to="{ name: 'optionValues' }"><a  href="#about">Option-Values</a></router-link>
               
                </div>
                <div class="itemclass">
                 <router-link :to="{ name: 'products' }"><a  href="#about">Products</a></router-link>
              
                </div>

                <div class="itemclass">
                 <router-link :to="{ name: 'productOption' }"><a  href="#about">Product-Options</a></router-link>
              
                </div>
                <div class="itemclass">
                 <router-link :to="{ name: 'productCombination' }"><a  href="#about">Product-Combinations</a></router-link>
              
                </div>
                </div>

                <div class="main">

                

               
                <div class="row">
                <div class="col-md-12">
                
               <label>Admin Section For Intrior design create Products. Start by creating category select from side bar </label>
                <router-view></router-view>
              
                
                </div>
                </div>
                </div> 
                </div> 

    </template>
    <script>
        export default {

           props : ['title']
        }
    </script>
    <style scoped>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            text-align: center;
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
        .sidenav a {
                    font-size: 16px;
                }
    </style>