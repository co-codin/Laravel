<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form @submit.prevent="createProduct">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model="product.name" type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input v-model="product.year" type="number" id="year" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input v-model="product.price" type="number" id="price" class="form-control">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                product: {}
            }
        },
        mounted() {
            console.log('Product Component mounted.')
        },

        methods: {
            createProduct(){
                let uri = 'http://chart.test/products';
                axios.post(uri, this.product).then((response)=>{
                    window.location.reload();
                });
            }
        }
    }
</script>
