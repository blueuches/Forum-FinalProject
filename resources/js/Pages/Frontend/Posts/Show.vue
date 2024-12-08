<template>
    <GuestLayout>

        <section  class="flex md:flex-row m-2 p-2 ">
            <div class="w-8/12">
                <h1>{{ post.title }}</h1>
                Post details
            </div>
            <div class="w-4/12 p-4">
                <div class="m-2 p-2 bg-slate-500 text-white">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </GuestLayout>
    </template>
    
    <script  setup>
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    
    const props = defineProps({
        community: Object,
        post: Object,
    })
    </script>