
<template layout>
  <div style="display:flex; place-content: center;">
    <div style="width: 1000px;" class="bg-slate-400 p-10">
      <h1 class="text-4xl text-white"><b>All Users</b></h1>
      <br> <br>

      <div class="" style="margin-top: -25px;">
        <Link v-for="user in users" :key="user.id">

          <div class="mb-5 flex">
            <div class="p-4 bg-slate-300 mb-5 rounded-3xl" style="width: 1000px;">
              <div class="">
                <div class="">
                  <b class="mt-1" style="font-size: 17px;">

                   <b style="font-size: 30px;"><i class="fa-solid fa-user"></i> {{ user.username }}</b> <br>
                   Full Name: {{ user.fullname }}

                   <b class="float-right">Joined At: {{ formatDate(user.created_at) }}</b>


                  </b>
                </div>
              </div>
            </div>
          </div>
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const { props } = usePage();

const users = ref([]);


onMounted(() => {
  users.value = props.value.users;

});

const formatDate = (dateString) => {
  const date = new Date(dateString);
  const options = { year: '2-digit', month: '2-digit', day: '2-digit' };
  return date.toLocaleDateString('en-US', options);
};


</script>
