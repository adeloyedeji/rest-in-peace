import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        project: {},
        occupation: [],
        states: [], 
        lgas: {},
    }, 
    getters: {
        getProject(state) {
            return state.project;
        }, 
        getOccupation(state) {
            return state.occupation;
        }, 
        getStates(state) {
            return state.states;
        }, 
        getLgas(state) {
            return state.lgas;
        }
    }, 
    mutations: {
        setProject(state, project) {
            state.project = project;
        },
        setOccupation(state, occupation) {
            state.occupation.push(occupation);
        },
        setStates(state, s) {
            state.states.push(s);
        }, 
        setLgas(state, lgas) {
            state.lgas = lgas;
        }
    }
});