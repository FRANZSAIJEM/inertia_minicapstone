<template layout>
    <div style="display:flex; place-content: center;">
      <div style="width: 1000px;" class="bg-slate-400 p-10">
        <h1 class="text-4xl text-white"><b>Recent Posts</b></h1>
        <br> <br>

        <div class="" style="margin-top: -25px;">
          <div v-for="content of contents" :key="content.id">
            <div class="p-4 bg-slate-300 mb-5 rounded-3xl">
              <div class="flex justify-between">
                <div class="block">
                    <b class="mt-1" style="font-size: 17px;"><i class="fa-solid fa-user"></i> {{ content.user ? content.user.username : 'Unknown' }}</b>
                    <h6 style="opacity: 40%;">{{ content.real_time }}</h6>

                </div>
                <div>
                    <Link v-if="shouldShowButtons(content)" :href="'/contents/edit/' + content.id"><button  class="m-1 p-2 hover:text-green-600 duration-150 rounded-lg text-white">
                        <b><i class="fa-solid fa-pen-to-square"></i> Edit</b>
                        </button>
                    </Link>

                    <button v-if="shouldShowButtons(content)" class="m-1  p-2 rounded-lg text-white  hover:text-red-600 duration-150" @click="remove(content)">
                    <b><i class="fa-solid fa-trash"></i> Delete</b>
                    </button>


                </div>
              </div>
              <br> <br>

              <textarea class="p-5 bg-slate-100 rounded-3xl" disabled v-model="content.content" name="" id="" cols="113" rows="5" style="resize: none; margin-top: -30px;"></textarea>
            </div>

          </div>


          <template v-if="showConfirm">
            <div class="fixed inset-0 flex items-center justify-center z-50">
              <div class="bg-white p-8 rounded-lg">
                <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
                <p>Are you sure you want to delete this post?</p>
                <div class="mt-6 flex justify-end">
                  <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md mr-2" @click="cancelDelete()">Cancel</button>
                  <button class="px-4 py-2 bg-red-600 text-white rounded-md" @click="confirmDelete()">Delete</button>
                </div>
              </div>
            </div>
          </template>



        </div>
      </div>
    </div>
  </template>



<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import { defineProps, ref, toRef  } from 'vue';
import {useForm} from '@inertiajs/inertia-vue3'


let showConfirm = ref(false);
let showEditConfirm = ref(false);


let deleteForm = useForm();
let updateForm = useForm();




let selectedContentForDelete = null
let selectedContentForEdit = null



const shouldShowButtons = (content) => {
  return content.isOwnedByLoggedInUser || toRef(props, 'loggedIn').value;
};


const props = defineProps({
  contents: Array,
  loggedIn: {
    type: [Object, Boolean],
    default: false
  }
});

function remove(Content){

selectedContentForDelete = Content;
showConfirm.value = true
}


function confirmDelete(){
    deleteForm.delete('/contents/' + selectedContentForDelete.id)
    showConfirm.value = false;
}


function cancelDelete(){
    showConfirm.value = false;
}





function edit(Content){
selectedContentForEdit = Content;
showEditConfirm.value = true
}





function confirmUpdate(){
    updateForm.edit('/contents/' + selectedContentForDelete.id)
    showEditConfirm.value = false;
}


function cancelEdit(){
    showEditConfirm.value = false;
}



</script>
