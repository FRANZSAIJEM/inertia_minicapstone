<template layout="default">

    <div style="display:flex; place-content: center;">
        <div style="width: 1000px;" class="bg-slate-400 p-10">

            <h1 class="text-4xl text-white"><b>Create User</b></h1>
            <br> <br>
            <div class="flex">
                <form @submit.prevent="submit" style="width: 500px;">

                    <div class="mb-4 flex flex-col">
                        <label for="username" style="font-size: 20px;"><b>User Name:</b></label>
                        <input v-model="form.username" type="text" class="p-3" id="username">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label for="password" style="font-size: 20px;"><b>Password:</b></label>
                        <input v-model="form.password" type="password" class="p-3" id="password">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                    </div>

                    <div class="mb-4 flex flex-col">
                        <label for="fullname" style="font-size: 20px;"><b>Full Name:</b></label>
                        <input v-model="form.fullname" type="text" class="p-3" id="fullname">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.fullname">{{ form.errors.fullname }}</div>
                    </div>


                    <div class="mb-4">
                        <button type="submit" class="btn-primary bg-slate-700 hover:bg-slate-800 duration-100 p-5 text-white">
                            Register
                        </button>
                    </div>
                    <div class="text-sm text-red-500 italic" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>

                </form>
                <div class="bg-slate-500" style="padding: 200px; margin-top: -90px; margin-left: 100px;">
                    <h1></h1>
                </div>
            </div>
        </div>

    </div>


</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    username:'',
    password:'',
    fullname:'',
    designation:'',
    department:''
})

const submit = () => {
    form.post('/users')
}

</script>
