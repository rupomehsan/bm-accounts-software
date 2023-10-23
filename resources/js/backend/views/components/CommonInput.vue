<template>
    <div class="form-group">
        <label for="">
            {{ label || name }}
        </label>
        <div v-if="type === 'text'" class="mt-1 mb-3">
            <input class="form-control" type="text" :name="name" :id="name">
        </div>
        <div v-if="type === 'password'" class="mt-1 mb-3">
            <input class="form-control" type="password" :name="name">
        </div>
        <div v-if="type === 'email'" class="mt-1 mb-3">
            <input class="form-control" type="email" :name="name">
        </div>
        <div v-if="type === 'textarea'" class="mt-1 mb-3">
            <textarea class="form-control" type="text" :name="name"></textarea>
        </div>
        <div v-if="type === 'select'" class="mt-1 mb-3">
            <select :name="name" class="form-select">
                <option v-for="data in data_list" :key="data" :value="data.value">
                    {{ data.label }}
                </option>
            </select>
        </div>
        <div v-if="type === 'file'" class="mt-1 mb-3">
            <image-component :name="name" :multiple="false"
                                :accept="`.jpg,.jpeg,.png`"></image-component>
            
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
        data_list: {
            required: false,
            type: Array,
        },
    }
}
</script>

<style></style>
