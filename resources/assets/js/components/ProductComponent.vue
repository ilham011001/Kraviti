<template>
    <div class="grid-x">
        <div class="cell large-3 category">
            <h4 class="category-title">Product By</h4>
            <p class="subtitle">Collection</p>
            <ul class="category-list">
                <li class="category-list-item"><a href="#" @click="getProduct">All</a></li>
                <li class="category-list-item" v-for="row in category">
                    <a href="#" @click="category_click(row.id)">{{ row.name }}</a>
                </li>
            </ul>
        </div>
        <div class="cell large-9">
            <div class="loader">
                <p>Loading</p>
            </div>
            <div class="custom-select">
                <select class="field" v-model="dropdownvalue" @change.prevent="getSorting">
                    <option value="sortby" selected>Sort By</option>
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                </select>
            </div>
            <ul class="grid-x product-list">
                <li class="cell small-12 medium-4 large-4" v-for="row in product">
                    <a :href="linkhref+row.id" class="product-block">
                        <article class="product-padding">
                            <img :src="link+row.image" class="image-small">
                            <p class="name">{{ row.name }}</p>
                            <p class="price2">Rp {{ formatPrice(row.price) }}</p>
                        </article>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<style>
    .loader {
        
        z-index: 99;
        position: absolute;
        /*background: black;*/
        top: 150px;
        right: 0px;
        left: 750px;
        width: 200px;
        height: 100px;
        padding: 25px 45px;
    }
    .loader p {
        font-size: 30px;
        font-style: bold;
    }
</style>



<script>
    import axios from 'axios';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                category:'',
                product:'',
                link:'images/product/',
                dropdownvalue:'sortby',
                linkhref:'product/',
            }
        },
        methods:{
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            getProduct()
            {
                $('.loader').toggle();
                axios.get('data_product')
                .then(response=>{
                    this.product = response.data.list;
                    console.log(response.data.list);
                    $('.loader').toggle();
                });
            },
            getCategory()
            {
                axios.get('category_list')
                .then(response=>{
                    this.category = response.data.list;
                    console.log(response.data.list);
                });  
            }
            ,
            getSorting()
            {
                if (this.dropdownvalue == 'name'){

                    function SortByName(a, b){
                      var aName = a.name.toLowerCase();
                      var bName = b.name.toLowerCase(); 
                      return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0)); // asc
                      return ((bName < aName) ? -1 : ((bName > aName) ? 1 : 0)); // desc
                    }

                    this.product.sort(SortByName);
                    console.log('sort by name');
                    console.log(this.product);

                }else if (this.dropdownvalue == 'price') {

                    function sortByPrice(a,b){
                        return a.price - b.price; // asc
                        return b.price - a.price; // desc
                    }

                    this.product.sort(sortByPrice);
                    console.log('sort by price');
                    console.log(this.product);
                }
            },
            category_click(id)
            {
                $(".loader").toggle();
                axios.get('data_category/'+id)
                .then(response => {
                    this.product = response.data.list;
                    $(".loader").toggle();
                });
            }
        },
        created:function(){
            this.getProduct();
            this.getCategory();
        }
    }
</script>
