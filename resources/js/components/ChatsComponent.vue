<template>
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul class="list-unstyled" style="height: 300px; overflow-y: scroll" v-chat-scroll>
                        <li class="p-2"
                            v-for="(message, index) in messages"
                            :key="index"
                        >
                            <strong>{{ message.user.name }}</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>
                <input
                    @keydown="sendTypingEvent"
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message"
                    class="form-control">
            </div>
            <span class="text-muted pl-2" v-if="activeUser">{{ activeUser.name }} is typing...</span>
        </div>
        <div class="col-4">
            <div class="card card-default m-0">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2 text-success" v-for="(user, index) in users" :key="index">
                            <div class="text-muted">{{ user.name }}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { clearTimeout } from 'timers';
    export default {
        props: ['user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                users: [],
                activeUser: false,
                typingTimer: false,
            }
        },
        mounted() {
            console.log('Chat component running successfully.');
        },
        created() {
            this.fetchMessages();

            Echo.join('chat')
                .here(users => {
                    this.users = users;
                })
                .joining(user => {
                    this.users.push(user);
                })
                .leaving(user => {
                    this.users = this.users.filter(u => u.id != user.id);
                })
                .listen('MessageSent', event => {
                    this.activeUser = false;
                    this.messages.push(event.message);
                })
                .listenForWhisper('typing', user => {
                    this.activeUser = user;

                    if (this.typingTimer) {
                        window.clearTimeout(this.typingTimer);
                    }
                    this.typingTimer = setTimeout(() => {
                        this.activeUser = false;
                    }, 2000);
                });
        },
        methods: {
            fetchMessages() {
                axios.get('messages').then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                axios.post('messages', {
                    message: this.newMessage,
                })
                .then(res => {
                    if(res.data.success) {
                        this.messages.push({
                            user: this.user,
                            message: res.data.message
                        });
                    }
                    this.newMessage = ''
                })
            },
            sendTypingEvent() {
                Echo.join('chat')
                    .whisper('typing', this.user);
            },
        }
    }
</script>
