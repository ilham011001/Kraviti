<template>
    <div class="cell large-9">
        <div class="custom-select">
            <select class="field" v-model="dropdownvalue" @change.prevent="getValue">
                <option value="sortby" selected>Sort By</option>
                <option value="name">Name</option>
                <option value="price">Price</option>
            </select>
        </div>
        <ul class="grid-x product-list">
            <li class="cell small-12 medium-4 large-4" v-for="anyar in data">
                <a :href="linkhref+anyar.id" class="product-block">
                    <article class="product-padding">
                        <img :src="link+anyar.image" class="image-small">
                        <p class="name">{{ anyar.name }}</p>
                        <p class="price2">{{ anyar.price }}</p>
                    </article>
                </a>
                <input type="hidden" v-model="category_id" value="3">
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                data:'',
                link:'/images/product/',
                dropdownvalue:'sortby',
                linkhref:'/product/',
                category_id:'2',
            }
        },
        methods:{
            getData()
            {
                axios.get('/data_category/3')
                .then(response=>{
                    this.data = response.data.list;
                    console.log(response.data.list);
                    console.log('id '+this.category_id);
                });
            },
            getValue()
            {
                axios.get('data/'+this.dropdownvalue)
                .then(response=>{
                    this.data = response.data.list;
                });
            }
        },
        created:function(){
            this.getData();
        }
    }
</script>
