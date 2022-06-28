<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 py-3">
        <div class="container-fluid">
            <ul class="nav">
                <li>
                    <Link
                        class="navbar-brand"
                        :href="route('products.index')"
                        :class="{
                            'fw-bold text-decoration-underline':
                                $page.component === 'Product/Index',
                        }"
                        >Product
                    </Link>
                </li>
            </ul>

            <ul class="nav">
                <li
                    style="
                        font-family: 'Times New Roman';
                        font-weight: bolder;
                        color: white;
                        font-size: 20px;
                    "
                >
                    LARAVEL 8 Inertia CRUD Nav.vue
                </li>
            </ul>
        </div>
    </nav>
</template>
<script>
// import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        // Link,
    },
};
</script>
