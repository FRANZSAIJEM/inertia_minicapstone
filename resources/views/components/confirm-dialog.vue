<template>
    <div class="overlay">
    </div>
    <div class="dialog-wrapper">

        <div class="dialog">
            <h3 class="text-3xl">{{ title }}</h3>
            <hr class="border-green-700 mt-2">
            <div class="mt-4 text-center">
                {{ message }}

            </div>
            <div class="flex justify-center space-x-2 mt-28">
                <button @click="$emit('delete')" class="bg-green-700 rounded-xl p-2 text-white hover:bg-green-800 duration-200 hover:translate-y-1">
                    Confirm
                </button>
                <button @click="$emit('cancel')" class="bg-red-700 rounded-xl p-2 text-white hover:bg-red-800 duration-200 hover:translate-y-1">
                    Cancel
                </button>
            </div>

        </div>

    </div>

</template>

<script setup>


let props = defineProps({
    title: "",
    message: ""

})

</script>
