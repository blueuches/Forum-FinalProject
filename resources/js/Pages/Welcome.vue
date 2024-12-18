<template>
    <GuestLayout>
        <Head title="Ceesius" />
        <div class="bg-slate-100 text-white py-20 text-center shadow-lg">
                <h1 class="text-6xl font-extrabold mb-4" style="color: #a2cf6e;">Browse latest post in Ceesius!</h1>
                <p class="text-xl font-medium" style="color: #a2cf6e;">Your ultimate destination for communication, collaboration, and growth.</p>
        </div>
        <section  class="flex md:flex-row m-2 p-2 ">
            <div class="w-8/12">
                <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id"/>
            </div>
            <div class="w-4/12 p-4">
                <CommunityList :communities="communities.data">
                    <template #title>
                        Top Communities
                    </template>
                </CommunityList>
            </div>
        </section>
    </GuestLayout>
    </template>
    
    <script  setup>
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import PostCard from "@/Components/PostCard.vue";
    import Pagination from "@/Components/Pagination.vue";
    import CommunityList from "@/Components/CommunityList.vue";
    
    const props = defineProps({
        communities: Object,
        posts: Object,
    })
    </script>