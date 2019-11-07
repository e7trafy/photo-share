import Vue from 'vue';
import  Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    state: {
        albums: [],
    },

    actions: {
        async getUserAlbums({ commit },userID) {
            console.log(userID);
            return commit('setAlbums', await api.get('/albums/get_all_user/' + userID))
        },
        async getPublicAlbums({ commit }) {
            return commit('setAlbums', await api.get('get_public_all'))
        },
    },

    mutations: {
        setAlbums(state, response) {
            state.albums = response.data.data;
        },
    },
    strict: debug
});
