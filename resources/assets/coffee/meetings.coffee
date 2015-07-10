index = new Vue (
  el: "#meetings"

  data:
    meetings: {}
    search: ''

  ready: () ->
    this.fetchMeetings()

  methods:
    fetchMeetings: () ->
      this.$http.get('/api/listmeetings', (meetings) ->
        this.meetings = meetings
      )
)