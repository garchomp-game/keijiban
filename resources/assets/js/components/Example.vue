<script>
export default {
  mounted() {
    this.connectChannel();
  },
  methods: {
    connectChannel() {
      Echo.channel("chat.").listen("MessageRecieved", e => {
        store.recieveMessage(e.messages);
      });
    }
  }
};
</script>
