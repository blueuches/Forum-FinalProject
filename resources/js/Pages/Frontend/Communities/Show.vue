<template>
<GuestLayout>
    <template #header>
            <div class="flex justify-between m-2 p-2">
                <h2
                class="text-xl font-semibold leading-tight text-gray-800"
                >
                    r/{{ community.name }}
                </h2>
                <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-2 rounded bg-[#a2cf6e] text-white">Create Post</Link>
            </div>
    </template>

    <section  class="flex md:flex-row m-2 p-2 ">
        <div class="w-8/12">
            <PostCard v-for="post in posts.data" :post="post" :community="community.slug" :key="post.id"/>
            <div class="mt-4 p-2">
                <Pagination :links="posts.meta.links"/>
            </div>
        </div>
        <div class="w-4/12 p-4">
            <div>
                <h2 class="font-semibold text-lg p-6 bg-[#a2cf6e] rounded-t-lg text-white">About {{ community.name }}</h2>
                <p class="bg-white p-4 rounded-b-large">{{ community.description }}</p>
            </div>
            <CommunityList :communities="communities.data" class="mt-4">
                <template #title>
                    Latest Communities
                </template>
            </CommunityList>
        </div>
    </section>
</GuestLayout>
</template>

<script  setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Link } from "@inertiajs/vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import CommunityList from "@/Components/CommunityList.vue";

const props = defineProps({
    community: Object,
    posts: Object,
    communities: Object,
})
</script>