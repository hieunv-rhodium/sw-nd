const app = new Vue({
    el: '#app',

    data: {

        messages: [],

        currentuser: '',
        
        currentavatar:'',

        roomCount: []

    },

    methods: {

        scrollToEnd: function() {       
          var container = this.$el.querySelector("#chat-box");
          container.scrollTop = container.scrollHeight;
        },   

        addMessage(message) 
        {

            // add to existing messages

            this.messages.push(message);


            axios.post('/chat-messages', message)
                .then(response => {

            })
            .catch(error => {
                    console.log(error);
            });

        },

    }, 

    mounted() {
        this.scrollToEnd();
    },

    created(){

        axios.get('/chat-messages').then(response=> {

            this.messages = response.data;

        });

        axios.get('/username').then(response=> {

            this.currentuser = response.data;

        });

        axios.get('/avatar').then(response=> {

            this.currentavatar = response.data;

        });

        Echo.join('chatroom')
            .here((users) => {

            this.roomCount = users;

        })
        .joining((user) => {

            this.roomCount.push(user);

        })
        .leaving((user) => {

            this.roomCount = this.roomCount.filter(u => u != user);

        })
        .listen('MessagePosted', (e) => {

            this.messages.push({

                message: e.message.message,
                user: e.user,
                avatar: e.avatar

            });

        });
    }
    
});