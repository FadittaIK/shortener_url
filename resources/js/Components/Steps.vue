<template lang="">
    <div class="m-3">
        <ul class="flex flex-row content-center gap-5">
            <li v-for="(step, index) in steps" class="pb-2" ::key="index">
                <span class="px-3 bg-primary rounded-xl my-auto">{{index +1}}</span> {{step}}
            </li>
        </ul>
    </div>
</template>

<script setup>
const steps = ['Introduzca la URL larga que desea acortar', 'Haga clic en "Acortar', 'Comparta su enlace corto'];
</script>
