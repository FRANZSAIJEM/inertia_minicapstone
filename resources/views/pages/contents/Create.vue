<template layout="default">
     <div style="display:flex; place-content: center;">
        <div style="width: 1000px;" class="bg-slate-400 p-10">

            <h1 class="text-4xl text-white"><b>Create Post</b></h1>
            <br>

            <div style="display: grid; place-content: center;">
                <form @submit.prevent="submit" >

                <div clas="mb-3">

                    <textarea style="resize: none;" class="bg-slate-100 rounded-2xl p-4" v-model="form.content" name="" id="" cols="120" rows="5" placeholder="What's on your mind"></textarea>

                    <div class="text-sm text-red-500 italic" v-if="form.errors.content">{{ form.errors.content }}</div>
                </div>
                <div>
                    <button style="width: 100px; transform: translateY(-50px) translateX(850px);" type="submit" class="rounded-lg btn-primary bg-slate-700 hover:bg-slate-800 duration-100 p-5 text-white">
                            Post
                    </button>
                </div>
                </form>
            </div>


        </div>

    </div>

</template>


<script setup>

import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    content:'',

})

const submit = () => {
    form.post('/contents')
}

</script>
