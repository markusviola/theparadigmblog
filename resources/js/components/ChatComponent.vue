<template>
    <div class="global-chatbox">
        <div class="card neutral-round shadow-sm">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center text-secondary">
                    <span>Public Chat</span>
                    <div class="d-flex align-items-center">
                        <span>
                            <strong>{{ users.length }}</strong> online
                        </span>
                        <i class="fas fa-circle fa-sm alt-neutral ml-2"></i>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" style="height: 100%;">
                <ul class="list-unstyled" style="height: 25.5rem; overflow-y: scroll" v-chat-scroll>
                    <li class="p-2 pl-3"
                        v-for="(message, index) in messages"
                        :key="index"
                    >
                        <strong class="alt-anti-neutral">{{ message.user.username }} > </strong>
                        <span class="text-dark">{{ message.message }}</span>
                    </li>
                </ul>
            </div>
            <input
                @keydown="sendTypingEvent"
                @keyup.enter="sendMessage"
                v-model="newMessage"
                type="text"
                name="message"
                :placeholder="user.id ? 'Say hello to everyone!' : 'Log in and say hello!'"
                class="form-control rounded-0"
            >
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
                isLoggedIn: true,
                activeUser: false,
                typingTimer: false,
            }
        },
        mounted() {
            console.log(this.user);
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
                .listen('.TheParadigmArticles\\Events\\MessageSent', event => {
                    this.activeUser = false;
                    this.messages.push(event.message);
                })
                .listenForWhisper('typing', user => {
                    // This won't work unless client events
                    // are enabled from the provider.
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
                .catch(err => {
                    const unAuth = '#unauth-access';
                    window.location.href = `/login${unAuth}`;
                })
            },
            sendTypingEvent() {
                Echo.join('chat')
                    .whisper('typing', this.user);
            },
        }
    }
</script>
