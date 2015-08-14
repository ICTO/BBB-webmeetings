index = new Vue (
  el: "#meetings"

  data:
    meetings: {}
    search: ''
    currentPage:0
    itemsPerPage: 20

  created: () ->
    this.fetchMeetings()

  computed:
    totalPages: () ->
      return Math.ceil(this.meetings.length / this.itemsPerPage)

  methods:
    fetchMeetings: () ->
      this.$http.get('/api/listmeetings', (meetings) ->
        this.meetings = meetings
      )
    setPage: (pageNumber) ->
      this.currentPage = pageNumber

  filters:
    paginate: (list) ->
      index = this.currentPage * this.itemsPerPage
      return list.slice(index, index + this.itemsPerPage)
)

mymeetings = new Vue (
  el: "#mymeetings"

  data:
    meetings: {}
    sortKey: ''
    reverse: false
    search: ''

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