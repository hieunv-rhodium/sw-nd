<template lang="html">

    <div class="chat-create input-group">

        <input class="form-control" type="text" placeholder="Start typing your message..." v-model="messageText" @keyup.enter="sendMessage">

        <div class="input-group-btn">
            <button type="button" class="btn btn-success" @click.prevent="sendMessage">
                <i class="fa fa-plus"></i>
            </button>
        </div>

    </div>

</template>


<script>

    export default {

        props: ['currentuser','currentavatar'],

        data() {

            return {

                messageText: ''

            }


        },

        methods: {

            sendMessage(){

                this.$emit('messagecreated', {

                    message: this.messageText,
                    user: {

                        name: this.currentuser,
                        avatar: this.currentavatar
 
                    },

                });

                this.messageText = '';
            }

        }

    }


</script>