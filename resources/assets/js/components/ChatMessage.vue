<template lang="html">
    <div class="chat-message item">

        <img v-bind:src="'/imgs/avatar/' + message.user.avatar " alt="user image" class="online">

        <p class="message">
            <a href="#" class="name">
                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i>
                    {{ formattedDate() ? formattedDate() : currentDate() }}
                </small>
                {{ message.user.name }}
            </a>
            {{ message.message }}
        </p>

    </div>

</template>


<script>

    export default {

        props: ['message'],



        methods:  {

            formattedDate(){


                if (typeof this.message.created_at === 'undefined' || null){

                    return false;
                }

                let date = this.message.created_at;


                let NowMoment = moment(date);


                return NowMoment.fromNow();

            },

            currentDate(){


                let now = moment();


                return now.fromNow();


            }



        }


    }


</script>
