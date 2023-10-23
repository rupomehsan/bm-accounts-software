import { defineStore } from "pinia"

export const user_setup_store = defineStore('user_setup_store', {
    state: () => ({
        all_data: {},
        single_data: {},
    }),
    getters: {
        doubleCount: (state) => state.count * 2,
    },
    actions: {
        all: async function (url) {
            let response
            if (url) {
                response = await axios.get(url)
            } else {
                response = await axios.get('users')
            }
            // console.log(response.data);
            this.all_data = response.data;
        },
        get: async function (id) {
            let response = await axios.get('users' + id);
            response = response.data
            this.single_data = response
        },
        store: async function (form) {
            let formData = new FormData(form);
            let response = await axios.post('users', formData)
            window.s_alert("Data created")
            console.log("res", response.data);
        },
        update: async function (form) {
            let response = await axios.post('users', form)
            window.s_alert("Data  updated")
            console.log(response.data);
        },
        delete: async function (id) {
            var data = await window.s_confirm()
            if (data) {
                let response = await axios.post('users' + id)
                window.s_alert("Data deleted")
                this.all();
                console.log(response.data);
            }

        },
    },
})
