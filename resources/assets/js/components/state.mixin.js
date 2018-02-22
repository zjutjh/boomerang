export const state = {
    token: '',
    user: {}
}

export const setState = (data) => {
    state.token = data.token;
    state.user = data.user;
}

export const getToken = () => state.token
export const getUser = () => state.user

export default {
    data: () => ({
        state
    }),
    methods: {
        setState,
        getToken,
        getUser
    }
}

