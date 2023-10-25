<template>
    <div class="form-group">
        <label for="">
            {{ label || name }}
        </label>
        <div
            v-if="['text', 'number', 'password', 'email'].includes(type)"
            class="mt-1 mb-3"
        >
            <input
                class="form-control"
                :type="type"
                :name="name"
                :id="name"
                :value="value"
            />
        </div>
        <div v-if="type === 'textarea'" class="mt-1 mb-3">
            <textarea class="form-control" type="text" :name="name"></textarea>
        </div>
        <div v-if="type === 'select'" class="mt-1 mb-3">
            <select :name="name" class="form-select">
                <option
                    v-for="data in data_list"
                    :key="data"
                    :value="data.value"
                    :selected="data.value == value"
                >
                    {{ data.label }}
                </option>
            </select>
        </div>
        <div v-if="type === 'file'" class="mt-1 mb-3">
            <image-component
                :name="name"
                :multiple="multiple"
                :accept="`.jpg,.jpeg,.png`"
                :images="[value]"
            ></image-component>
        </div>
    </div>
</template>

<script>
/**
 * props:
 */
export default {
    props: {
        name: {
            required: true,
            type: String,
        },
        label: {
            required: true,
            type: String,
        },
        type: {
            required: true,
            type: String,
        },
        multiple: {
            required: false,
            type: Boolean,
        },
        value: {
            required: false,
            type: String,
        },
        data_list: {
            required: false,
            type: Array,
        },
    },
};
</script>

<style></style>
