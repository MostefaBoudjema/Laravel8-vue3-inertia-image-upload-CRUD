<template>
    <Nav />
    <!-- <div class="mx-4 my-1"> -->
    <div class="container">
        <div class="card">
            <slot />
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import Nav from "../Shared/Nav";
import Footer from "../Shared/Footer";

export default {
    components: {
        Nav,
        Footer,
    },
};
</script>


