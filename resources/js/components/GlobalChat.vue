<template>
    <div :class="`chat-wrapper ${activeChat ? 'equalize-content ' : ''} mx-auto`">
        <div class="global-chatbox">
            <div class="card neutral-round shadow-sm">
                <div class="card-header chat-header panel-highlight" @click="activeChat = !activeChat">
                    <div class="d-flex align-items-center justify-content-between h-100 text-secondary">
                        <span class="chat-title">Public Chat</span>
                        <div class="d-flex align-items-center">
                            <span>
                                <strong class="text-right">{{ users.length }}</strong> online
                            </span>
                            <i class="fas fa-circle fa-sm alt-neutral ml-2"></i>
                        </div>
                    </div>
                </div>
                <div v-if="activeChat" class="card-body p-0">
                    <ul class="list-unstyled chat-content" v-chat-scroll>
                        <li class="p-2 pl-3"
                            v-for="(message, index) in messages"
                            :key="index"
                        >
                            <strong class="alt-anti-neutral">{{ message.from_user.username }} > </strong>
                            <span class="text-dark">{{ message.message }}</span>
                        </li>
                    </ul>
                </div>
                <input
                    v-if="activeChat"
                    @keyup.enter="sendMessage"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    :placeholder="user.id ? 'Say hello to everyone!' : 'Log in and say hello!'"
                    class="form-control chat-input rounded-0"
                >
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
                activeChat: true,
                messages: [],
                newMessage: '',
                users: [],
                isLoggedIn: true,
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
                .listen('.NewMessage', (event) => {
                    this.messages.push(event.message);
                });
        },
        methods: {
            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                })
            },
            sendMessage() {
                axios.post('/messages', {
                    message: this.newMessage,
                })
                .then(res => {
                    if(res.data.success) {
                        this.messages.push({
                            from_user: this.user,
                            message: res.data.message
                        });
                    }
                    this.newMessage = ''
                })
                .catch(err => {
                    const res = err.response;
                    if (res.status == 401) {
                        const unAuth = '#unauth-access';
                        window.location.href = `/login${unAuth}`;
                    } else notifyUser('Something went wrong.');
                })
            },
        }
    }
</script>
