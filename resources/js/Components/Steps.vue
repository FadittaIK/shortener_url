<template lang="">
    <div class="p-5">
       <ul class="flex flex-row">
       <li v-for="(step, index) in steps" class="p-2" ::key="index">
      <span class="px-3 bg-stone-200 rounded-xl">{{index +1}}</span>  {{step}}
       </li>
       </ul>
    </div>
</template>
<script setup>
const steps = ['Introduzca la URL larga que desea acortar', 'Haga clic en "Acortar', 'Comparta su enlace corto'];

</script>
<style lang="">

</style>
