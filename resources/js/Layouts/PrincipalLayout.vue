<template lang="">
    <div class="bg-gradient-to-r from-secondary to-primary  vh-100 flex flex-col items-center  p-5 min-vh-100 min-h-screen text-tertiary">
        <header class="p-5 text-center my-5 w-2/3">
            <slot name="header"> </slot>
        </header>
        <main class="">
            <slot></slot>
        </main>
    </div>
</template>

<script>
export default {}
</script>

<style lang="scss">

</style>
