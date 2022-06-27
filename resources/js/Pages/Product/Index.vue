<template>
    <Head title="Product" />
    <AppLayout>
        <div class="card-head bg-dark">
            <h1
                style="
                    font-family: 'Times New Roman', Times, serif;
                    font-weight: bolder;
                    font-size: 28px;
                    margin: 10px;
                    color: white;
                    text-align: center;
                "
            >
                Product List
            </h1>
            <Link :href="route('products.create')" class="btn btn-primary">
                Create
            </Link>
        </div>
        <div class="card-content">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">SN <sup>o</sup></th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(Product, index) in Products" :key="Product.id">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>
                            <Link :href="route('products.show', Product.id)"
                                ><img
                                    class="img-thumbnail"
                                    :src="'Product/' + Product.product_image"
                                    alt=""
                                    style="height: 80"
                            /></Link>
                        </td>
                        <td>{{ Product.product_title }}</td>
                        <td>{{ Product.product_name }}</td>
                        <td>{{ Product.product_code }}</td>
                        <td>
                            <i class="fa fa-usd"></i>
                            {{ Product.product_price }}
                        </td>
                        <td>{{ Product.product_description }}</td>
                        <td class="table-buttons">
                            <Link
                                :href="route('products.show', Product.id)"
                                class="btn btn-info"
                            >
                                <i class="fa fa-tag"></i>
                            </Link>
                            <Link
                                :href="route('products.edit', Product.id)"
                                class="btn btn-success"
                            >
                                <i class="fa fa-edit"></i>
                            </Link>
                            <form
                                method="POST"
                                action="{{ route('products.destroy', Product.id) }}"
                            >
                                <button
                                    @click="destroy(Product.id)"
                                    type="button"
                                    class="btn btn-danger"
                                >
                                    <i class="fa fa-remove"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Shared/App";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
const Swal = require("sweetalert2");
export default {
    components: {
        AppLayout,
        Head,
        Link,
        Swal,
    },
    props: {
        Products: Object,
    },
    methods: {
        destroy(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(route("products.destroy", id));
                }
            });
        },
    },
};
</script>
