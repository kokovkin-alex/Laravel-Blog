import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    //хранилище состояния, где хранятся все данные
    state: {
        firstName: 'John',
        lastName: 'Jayson'
    },

    //для запросов
    actions: {
        testAction(context, payload) {
            context.commit('SET_FIRSTNAME', response.data.name)
            context.commit('SET_LASTNAME', response.data.lastname)
        }
    },

    //для вычисляемых свойств
    getters: {
        getFullName(state) {
            return state.firstName + ' ' + state.lastName
        }
    },

    //записываем в переменные новые значения
    mutations: {
        SET_FIRSTNAME(state, payload) {
            state.firstname = payload;
        },
        SET_LASTNAME(state, payload) {
            state.lastname = payload;
        }
    },
})
