<template>
    <Head title="Product" />
    <AppLayout>
        <div class="card-head bg-dark">
            <h1
                style="
                    font-family: 'Times New Roman', Times, serif;
                    font-weight: bolder;
                    font-size: 20px;
                    text-transform: uppercase;
                    color: white;
                    text-align: center;
                "
            >
                Add New Product
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
                            class="form-control"
                            id="product_title"
                            v-model="form.product_title"
                        />
                    </div>
                    <div class="col-md-4">
                        <label for="product-name">Product Name</label>
                        <input
                            type="text"
                            name="product_name"
                            class="form-control"
                            id="product_name"
                            v-model="form.product_name"
                        />
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="product-price">Product Price</label>
                        <input
                            class="form-control"
                            type="number"
                            v-model="form.product_price"
                        />
                    </div>
                    <div class="col-md-6">
                        <label for="product-code">Product Code</label>
                        <input
                            class="form-control"
                            v-model="form.product_code"
                        />
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
                        id="product_image"
                        @change="onFileSelected"
                        class="form-control"
                        :v-model="form.product_image"
                    />
                </div>

                <div class="my-3">
                    <button class="btn btn-dark">Create Product</button>
                    <button class="btn btn-dark ms-2">
                        <Link
                            class="text-light text-decoration-none"
                            :href="route('products.index')"
                            >Back</Link
                        >
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Shared/App";
import { Head, Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayout,
        Head,
        Link,
    },
    props: {
        Products: Object,
    },
    data() {
        return {
            form: {
                product_name: "",
                product_title: "",
                product_image: "",
                product_price: "",
                product_code: "",
                product_description: "",
            },
        };
    },
    methods: {
        submit() {
            this.$inertia.post(this.route("products.store"), this.form);
        },
        onFileSelected(event) {
            console.log(event);
            this.form.product_image = event.target.files[0];
        },
    },
};
</script>