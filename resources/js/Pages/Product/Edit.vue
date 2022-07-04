<template>
    <Head title="Product" />
    <AppLayout>
        <div class="card-head bg-dark">
            <h1
                style="
                    font-family: 'Times New Roman', Times, serif;
                    font-weight: bolder;
                    font-size: 20px;
                    color: white;
                    text-align: center;
                "
            >
                Update New Product
            </h1>
            <hr />
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="product-title">Product Title</label>
                        <input
                            type="text"
                            name="product_title"
                            v-model="form.product_title"
                            class="form-control"
                            id="product_title"
                        />
                    </div>
                    <div v-if="errors.product_title" class="text-danger">
                        {{ errors.product_title }}
                    </div>
                    <div class="col-md-4">
                        <label for="product-name">Product Name</label>
                        <input
                            type="text"
                            name="product_name"
                            v-model="form.product_name"
                            class="form-control"
                            id="product_name"
                        />
                    </div>
                    <div v-if="errors.product_name" class="text-danger">
                        {{ errors.product_name }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-price">Product Price</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model="form.product_price"
                        />
                    </div>
                    <div v-if="errors.product_price" class="text-danger">
                        {{ errors.product_price }}
                    </div>
                    <div class="col-md-6">
                        <label for="product-code">Product Code</label>
                        <input
                            class="form-control"
                            v-model="form.product_code"
                        >
                    </div>
                    <div v-if="errors.product_code" class="text-danger">
                        {{ errors.product_code }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-description">Product Description</label>
                    <textarea
                        class="form-control"
                        v-model="form.product_description"
                    >
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="product-image">Product Image</label>
                    <input
                        type="file"
                        name="product_image"
                        @change="onFileSelected"
                        class="form-control"
                        id="product_image"
                    />
                    <p>
                        <img
                            class="img-thumbnail"
                            :src="'../../storage/Product/' + Product.product_image"
                            width="80"
                            height="50"
                            alt=""
                        />
                    </p>
                </div>
                <div class="my-3">
                    <button class="btn btn-dark me-2">Update Product</button>

                    <Link
                        class="text-light text-decoration-none btn btn-dark me-2"
                        :href="route('products.index')"
                        >Back</Link
                    >
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Shared/App";


// import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayout,
        // Head,
        // Link,
    },
    props: {
        Product: Object,
        errors: Object,
    },
    data() {
        return {
            form: {
                product_name: this.Product.product_name,
                product_title: this.Product.product_title,
                product_price: this.Product.product_price,
                product_code: this.Product.product_code,
                product_description: this.Product.product_description,
                product_image: this.Product.product_image,
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.put(
                this.route("products.update", this.Product.id),
                this.form
            );
        },
        onFileSelected(event) {
            console.log(event.target.files[0]);
            // console.log(event);
            this.form.product_image = event.target.files[0];
        },
    },
};
</script>
