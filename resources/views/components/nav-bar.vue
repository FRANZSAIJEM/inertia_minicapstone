<template>
<div style="display: grid; place-content: center;">
    <section class="bg-slate-800 p-5" style="width: 1000px;">
        <div class="wrapper flex justify-between">

            <div class="text-lg text-white font-bold py-4">
                <h1 v-if="!user" style="font-size: 50px;" class="hover:text-orange-400 duration-150">Chatter Box</h1>
                <Link v-if="user" class="hover:text-orange-400 duration-150" href="/contents" style="font-size: 50px;">Chatter Box</Link>
            </div>

            <div class="text-lg text-white font-bold py-4">

                <div v-if="!user" style="margin-bottom: 7px; margin-top: 6px;">
                    <Link class="py-4 text-white font-semibold px-2 hover:text-blue-400 duration-150" href="/users/create"><i class="fa-solid fa-fingerprint"></i> Register &nbsp;</Link>
                    <Link class="py-4 text-white font-semibold px-2 hover:text-red-400 duration-150" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Log In</Link>
                </div>

                <div v-if="user" style="margin-bottom: -50px; margin-top: -10px;">

                    <Link  class="py-4 text-white font-semibold px-2 hover:text-blue-400 duration-150" href="/contents"> <i class="fa-solid fa-house-chimney-window"></i> Home  &nbsp;</Link>
                    <Link  class="py-4 text-white font-semibold px-2 hover:text-blue-400 duration-150" href="/users/user"> <i class="fa-solid fa-users"></i> Users  &nbsp;</Link>
                    <Link class="py-4 text-white font-semibold px-2 hover:text-blue-400 duration-150" href="/contents/create"><i class="fa-solid fa-plus"></i> Create Post &nbsp; </Link>



                    <div class="dropdown">
                    <button class="dropbtn py-4 text-white font-semibold px-2 hover:text-red-400 duration-150">
                        <i class="fa-solid fa-right-from-bracket"></i> {{ user.username }}
                    </button>
                    <div class="dropdown-content" style="transform: translateX(-44px);">
                        <Link class="py-4 text-slate-900 font-semibold px-2 hover:text-red-400 duration-150" href="/logout" method="post" as="button">Logout</Link>
                    </div>
                </div>
                </div>


            </div>
        </div>
    </section>
</div>
</template>

<script setup>

import { Link } from '@inertiajs/inertia-vue3'
import { defineProps } from 'vue'

defineProps({
    user: Object
})
</script>
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropbtn {

        color: #ffffff;
        font-size: 17px;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content button {
        display: block;
        width: 100%;
        text-align: left;
        padding: 12px 16px;
        text-decoration: none;
        border: none;
        background-color: inherit;
        cursor: pointer;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
