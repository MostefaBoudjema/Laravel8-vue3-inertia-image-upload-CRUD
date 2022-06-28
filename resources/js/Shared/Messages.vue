<template>
    <main class="fs-3  text-center ">
        <div 
            v-if="$page.props.flash.error"
            class="text-light px-2 py-2 bg-danger alert alert-danger"
        >
            <p>{{ $page.props.flash.error }}</p>
        </div>
        <div
            v-if="$page.props.flash.message"
            class="text-light px-2 py-2  bg-info"
        >
            <p>{{ $page.props.flash.message }}</p>
        </div>
        <div
            v-if="$page.props.flash.success"
            class="text-light  px-2 py-2 bg-success alert-success"
        >
            <p>{{ $page.props.flash.success }}</p>
        </div>

        <!-- <slot></slot> -->
    </main>
</template>

<script>
export default {
    props:{
       
    },
    mounted() {

    },
};
</script>
<style scoped></style>
