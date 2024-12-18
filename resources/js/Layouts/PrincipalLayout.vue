<template lang="">
    <div class="bg-stone-600 vh-100 flex flex-col items-center  p-5 min-vh-100 min-h-screen">
        <header class="p-5 text-center">
            <slot name="header" > </slot>
        </header>
        <main class="bg-stone-600">
          <slot></slot>
        </main>
    </div>
</template>
<script>
export default {
}
</script>

<style lang="scss">


</style>
