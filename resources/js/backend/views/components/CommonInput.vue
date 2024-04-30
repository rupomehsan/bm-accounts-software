<template>
    <div class="form-group">
        <label for="">
            {{ label || name }}
        </label>
        <div v-if="['text', 'number', 'password', 'email', 'month'].includes(type)
                " class="mt-1 mb-3">
            <input class="form-control" :type="type" :name="name" :id="name" :value="value" @change="errorReset"
                :disabled="disabled" />
        </div>
        <div v-if="type == 'date'" class="mt-1 mb-3">
            <date-field :label="`Plan Date`" :name="name" :value="value" :dateFormat="dateFormat" />
        </div>
        <div v-if="type === 'textarea'" class="mt-1 mb-3">
            <textarea class="form-control" type="text" :name="name" :value="value" :disabled="disabled"
                @change="errorReset"></textarea>
            <div :id="name"></div>
        </div>

        <div v-if="type === 'checkbox'" class="mt-1 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" :name="name" :disabled="disabled" type="checkbox"
                    id="flexSwitchCheckDefault" />
            </div>
        </div>
        <div v-if="type === 'select'" class="mt-1 mb-3">
            <select :name="name" class="form-select" :id="name" :disabled="disabled" @change="errorReset">
                <option value="">Select item</option>
                <option v-for="data in data_list" :key="data" :value="data.value" :selected="data.value == value">
                    {{ data.label }}
                </option>
            </select>
        </div>
        <div v-if="type === 'file'" class="mt-1 mb-3">
            <image-component :name="name" :disabled="disabled" :multiple="multiple" :accept="`.jpg,.jpeg,.png`"
                :images="[value]"></image-component>
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
        disabled: {
            required: false,
            type: Boolean,
        },
        data_list: {
            required: false,
            type: Array,
        },
        dateFormat: {
            required: false,
            type: String,
            default: 'YYYY-MM-DD'
        },
        onchange: {
            required: false,
            type: Function,
            default: () => "",
        },
        onchangeAction: {
            required: false,
            type: String,
            default: null,
        },
    },

    methods: {
        errorReset(event) {
            let currentElement = event.target;
            let nextElement = currentElement.nextElementSibling;
            if (nextElement) {
                currentElement.classList.remove("border-warning");
                nextElement.remove();
            }

            if (this.onchange) {
                if (this.onchangeAction) {
                    this.onchange(this.onchangeAction, event, this)
                } else {
                    this.onchange(event);
                }
            }
        },
    },
};
</script>

<style></style>
