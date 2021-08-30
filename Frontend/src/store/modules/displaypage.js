const state = {
  displayPage: 1,
  projectId: 0
}

const getters = {
  changePage: state => state.displayPage
}

const actions = {
  change_Page({ commit }, pageNum) {
    commit('CHANGE_PAGE', pageNum)
  },
  change_Page_projectid({ dispatch, commit }, projectId) {
  	return dispatch('change_Page', 101).then(() => {
      commit('CHANGE_PAGE_PROJECTID', projectId)
  	})
  }
}

const mutations = {
  CHANGE_PAGE(state, pageNum) {
	state.displayPage = pageNum
  },
  CHANGE_PAGE_PROJECTID(state, projectId) {
  	state.projectId = projectId
  }
}

export default {
    state,
    getters,
    actions,
    mutations
}

