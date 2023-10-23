import { defineStore } from 'pinia'

export const use_auth_store = defineStore('auth_store', {
    state: () => ({
        is_auth: 0,
        auth_info: {
            full_name: "shefat",
            email: "a@g.com"
        }
    }),
    getters: {
    },
    actions: {
        set_is_auth: function (status) {
            this.is_auth = status;
        },
        log_out: async function () {
            await fetch('/api-logout', {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            return location.href = "/login";
        },
        check_is_auth: async function () {
            let that = this;
            await window.cookieStore.get('AXRF-TOKEN')
                .then(async (cookie) => {
                    if (!cookie) {
                        this.log_out();
                    }
                    let token = `Bearer ${cookie.value}`;
                    fetch("/api/v1/user", {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                            "Authorization": token,
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                        },
                    }).then(res => res.json())
                        .then(res => {
                            this.set_is_auth(res.auth_status);
                            this.auth_info = res.auth_information;
                        })
                })
        }
    },
})
