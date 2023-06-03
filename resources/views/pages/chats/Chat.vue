<template layout="default">
    <div style="display:flex; place-content: center;">
       <div style="width: 1000px;" class="bg-slate-400 p-10">

           <h1 class="text-4xl text-white"><b>Create Post</b></h1>
           <br>

           <div style="display: grid; place-content: center;">
               <form @submit.prevent="submit" >

               <div clas="mb-3">
                    <input  v-model="form.chat" type="text" name="" id="">


                   <div class="text-sm text-red-500 italic" v-if="form.errors.chat">{{ form.errors.chat }}</div>
               </div>
               <div>
                   <button style="width: 100px; transform: translateY(-50px) translateX(850px);" type="submit" class="rounded-lg btn-primary bg-slate-700 hover:bg-slate-800 duration-100 p-5 text-white">
                           Post
                   </button>
               </div>
               </form>
           </div>


           <div v-for="chat of chats" :key="chat.id">
            <div class="p-4 bg-slate-300 mb-5 rounded-3xl">
              <div class="flex justify-between">
                <div class="block">
                    <b class="mt-1" style="font-size: 17px;"><i class="fa-solid fa-user"></i> {{ chat.user ? chat.user.username : 'Unknown' }}</b>
                </div>

              </div>
              <br> <br>
              <textarea class="p-5 bg-slate-100 rounded-3xl" disabled v-model="chat.chat" name="" id="" cols="113" rows="5" style="resize: none; margin-top: -30px;"></textarea>
            </div>
          </div>


       </div>

   </div>

</template>


<script setup>

import { useForm } from '@inertiajs/inertia-vue3'
import { Link } from '@inertiajs/inertia-vue3'
import { defineProps, ref, toRef  } from 'vue';



let form = useForm({
   chat:'',

})

const submit = () => {
   form.post('/chats/create')
}

const props = defineProps({
  chats: Array,
  loggedIn: {
    type: [Object, Boolean],
    default: false
  }
});

</script>
