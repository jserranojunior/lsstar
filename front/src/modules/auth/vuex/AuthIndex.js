import state from './AuthState'
import mutations from './AuthMutations'
import * as actions from './AuthActions'
import * as getters from './AuthGetters'

export default {
  state,
  actions,
  getters,
  mutations,
  namespaced: true,
}