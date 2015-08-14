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

mymeetings = new Vue (
  el: "#mymeetings"

  data:
    meetings: {}
    sortKey: ''
    reverse: false

  ready: () ->
    this.fetchMeetings()

  methods:
    fetchMeetings: () ->
      this.$http.get('/api/mymeetings', (meetings) ->
        this.meetings = meetings
      )
    sortBy: (key) ->
      this.reverse = !this.reverse if this.sortKey == key
      this.sortKey = key
)