(function() {
  $('div.alert').not('alert-important').delay(3000).slideUp(300);

}).call(this);

(function() {
  var index;

  index = new Vue({
    el: "#meetings",
    data: {
      meetings: {},
      search: ''
    },
    ready: function() {
      return this.fetchMeetings();
    },
    methods: {
      fetchMeetings: function() {
        return this.$http.get('/api/listmeetings', function(meetings) {
          return this.meetings = meetings;
        });
      }
    }
  });

}).call(this);

//# sourceMappingURL=app.js.map