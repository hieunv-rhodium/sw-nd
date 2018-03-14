<template lang="html">
    <div class="chat-list">

        <chat-message v-for="message in messages"  v-bind:message="message"></chat-message>

        <div class="empty" v-show="messages.length === 0">

            No Messages Yet!

        </div>


    </div>

</template>


<script>

    export default {

        props: ['messages'],

    }


</script>
