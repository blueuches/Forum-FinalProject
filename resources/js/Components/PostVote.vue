<template>
    <div class="bg-[#a2cf6e] w-12 flex flex-col h-full  w-12 p-2 bg-slate-200 text-center rounded-lg">
        <UpVoteLink :slug="post.slug" :class="{'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1}"></UpVoteLink>
        <div class="p-2 my-2 font-bold text-white" :class="{'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1,'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1}">{{ post.votes }}</div>
        <DownVoteLink :slug="post.slug" :class="{'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1}"></DownVoteLink>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import UpVoteLink from './UpVoteLink.vue';
import DownVoteLink from './DownVoteLink.vue';

defineProps({
    post: Object,
})
</script>

<style>
</style>