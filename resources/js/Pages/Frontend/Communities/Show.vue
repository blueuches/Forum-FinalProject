<template>
<GuestLayout>
    <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                r/{{ community.name }}
            </h2>
            <div class="flex justify-end m-2 p-2">
                <Link v-if="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)" class="px-3 py-4 rounded bg-indigo-500">Create Post</Link>
            </div>
        </template>
    <section  class="m-2 p-2">
        <PostCard v-for="post in posts.data" :post="post" :community="community.name" :key="post.id"/>
    </section>
</GuestLayout>
</template>

<script  setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Link } from "@inertiajs/vue3";
import PostCard from "@/Components/PostCard.vue";

const props = defineProps({
    community: Object,
    posts: Object,
})
</script>