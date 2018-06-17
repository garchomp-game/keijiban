<template lang="html">
    <div>
        <textarea placeholder="メッセージを入力" v-model="messageText"></textarea>
        <button @click="sendMessage">送信</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messageText:''
            }
        },
        methods: {
            sendMessage() {
                if (this.messageText) {
                    this.$emit("messagesent", {
                        messge: this.messageText,
                    });
                    this.messagetext = '';
                }
            }
        }
    }
</script>
