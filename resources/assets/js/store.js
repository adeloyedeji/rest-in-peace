import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        project: {},
        occupation: [],
        states: [],
        lgas: {},
        dependents: [],
        projects: {},
        projectBen: {},
        crops: [],
        cropsName: [],
        beneficiaryCrops: [],
        beneficiaryProjects: [],
        beneficiaryProperties: [],
        roles: [],
        cropTotalValuation: 0,
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
        },
        getDependents(state) {
            return state.dependents;
        },
        getProjects(state) {
            return state.projects;
        },
        getProjectBen(state) {
            return state.projectBen;
        },
        getCrops(state) {
            return state.crops;
        },
        getCropsName(state) {
            return state.cropsName;
        },
        getbeneficiaryCrops(state) {
            return state.beneficiaryCrops;
        },
        getRoles(state) {
            return state.roles;
        },
        getBeneficiaryProjects(state) {
            return state.beneficiaryProjects;
        },
        getBeneficiaryProperties(state) {
            return state.beneficiaryProperties;
        },
        getCropTotalValuation(state) {
            return state.cropTotalValuation;
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
        },
        setDependent(state, dependents) {
            state.dependents.push(dependents);
        },
        setProjects(state, projects) {
            state.projects = projects;
        },
        setProjectBen(state, projectBen) {
            state.projectBen = projectBen;
        },
        setCrops(state, crops) {
            state.crops = crops;
        },
        setCropsName(state, cropsList) {
            state.cropsName = cropsList;
        },
        setbeneficiaryCrops(state, crops) {
            state.beneficiaryCrops.push(crops);
        },
        setRole(state, role) {
            state.roles.push(role);
        },
        updateRole(state, role) {
            var role = state.roles.find((r) => {
                if(r.id === role.id) {
                    r.name = role.name;
                    r.slug = role.slug;
                    r.description = role.description;
                }
            });
        },
        deleteRole(state, roleID) {
            var role = state.roles.find((r) => {
                return r.id === roleID;
            });
            if(role) {
                var index = state.roles.indexOf(role);
                state.roles.splice(index, 1);
            }
        },
        setBeneficiaryProjects(state, item) {
            state.beneficiaryProjects.push(item);
        },
        setBeneficiaryProperties(state, item) {
            state.beneficiaryProperties.push(item);
        },
        setCropTotalValuation(state, valuation) {
            state.cropTotalValuation += valuation;
        }
    }
});