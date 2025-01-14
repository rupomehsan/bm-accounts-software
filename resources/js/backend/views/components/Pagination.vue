<template>
    <nav aria-label="Page navigation example" class="">
        <ul class="pagination pagination-warning my-2">
            <template v-for="(link, index) in data?.links" :key="index">
                <li class="page-item" :class="{ active: link.active }">
                    <a
                        class="page-link"
                        :class="
                            data.current_page == data.last_page &&
                            data.links.length - 1 == index
                                ? 'disabled'
                                : ''
                        "
                        @click.prevent="
                            () =>
                                link.url
                                    ? method(
                                          isProduction
                                              ? forceHttps(link.url)
                                              : link.url
                                      )
                                    : ''
                        "
                        :href="link.url"
                        v-html="`<span>${link.label}</span>`"
                    >
                    </a>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
export default {
    props: {
        data: Object,
        method: Function,
    },
    computed: {
        /**
         * Check if the environment is production
         */
        isProduction() {
            return process.env.NODE_ENV === "production";
        },
    },
    methods: {
        /**
         * Ensure the URL uses HTTPS
         */
        forceHttps(url) {
            if (!url) return url;
            try {
                const urlObject = new URL(url);
                urlObject.protocol = "https:";
                return urlObject.toString();
            } catch (error) {
                console.error("Invalid URL:", url);
                return url; // Return as is if URL parsing fails
            }
        },
    },
};
</script>

<style></style>
