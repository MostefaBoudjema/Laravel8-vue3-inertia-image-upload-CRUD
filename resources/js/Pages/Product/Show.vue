<template>
    <Head title="Product Show" />
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
                <p>Product: {{ Product.product_name }}</p>
            </h1>
        </div>
        <div class="card-body">
            <div class="form-row">
                <label for="" class="col-md-2"
                    ><strong>Product Title:</strong></label
                >
                <p>{{ Product.product_title }}</p>
                <div class="col-md-4"></div>
                <label for="" class="col-md-2"
                    ><strong>Product Name:</strong></label
                >
                <div class="col-md-4">
                    <p>{{ Product.product_name }}</p>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-md-2"
                    ><strong>Product Code:</strong></label
                >
                <div class="col-md-4">
                    <p>{{ Product.product_code }}</p>
                </div>
                <label for="" class="col-md-2"
                    ><strong>Product Price:</strong></label
                >
                <div class="col-md-4">
                    <p><i class="fa fa-usd"></i> {{ Product.product_price }}</p>
                </div>
            </div>
            <div class="form-row">
                <label for="" class="col-md-2"
                    ><strong>Product Description:</strong></label
                >
                <div class="col-md-4">
                    <p>{{ Product.product_description }}</p>
                </div>
                <label for="" class="col-md-2"
                    ><strong>Product Image:</strong></label
                >
                <div class="col-md-4">
                    <p>
                        <img
                            class="img-thumbnail"
                            :src="'../storage/Product/' + Product.product_image"
                            width="180"
                            height="200"
                            alt=""
                        />
                    </p>
                </div>
                <Link
                    class="text-light text-decoration-none"
                    :href="route('products.index')"
                >
                    <button class="btn btn-dark me-2">Back</button>
                </Link>
            </div>
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
    },
    data() {
        return {
            form: {
                product_name: "",
                product_title: "",
                product_price: "",
                product_code: "",
                product_description: "",
                product_image: "",
            },
        };
    },
};
</script>
