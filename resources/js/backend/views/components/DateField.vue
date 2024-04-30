<template>
    <label :for="name || 'date'" class="text-capitalize d-block date_custom_control">
        <span class="mb-2 d-block"></span>
        <input type="date" :ref="`date_input`" @click="$event.target.showPicker()" @focus="$event.target.showPicker()"
            @change="format_date(); keyup_handler($event.target.value)" :id="name || 'date'" :name="name || 'date'"
            class="form-control">
        <!-- <div class="error text-warning">The given date field is required.</div> -->
        <div class="form-control preview">
            {{ formated_value }}
        </div>
    </label>
    <!-- <date-field :label="`Plan Date`" :name="`date`" /> -->
</template>

<script>
import moment from 'moment'
export default {
    props: {
        'label': {
            type: String,
        },
        'name': {
            type: String,
        },
        'value': {
            type: String,
            default: moment().format('YYYY-MM-DD'),
        },
        keyup_handler: {
            type: Function,
            default: () => '',
        },
        onchange: {
            required: false,
            type: Function,
            default: () => ''
        },
        dateFormat: {
            required: false,
            type: String,
            default: 'YYYY-MM-DD'
        }
    },
    data: () => ({
        formated_value: null,
        is_error_exist: false
    }),
    created: function () {
        let that = this
        setTimeout(() => {
            if (that.value) {
                this.$refs.date_input.value = that.value
            }
            that.format_date();

        }, 1000);


    },
    methods: {
        format_date: function () {
            let date = moment(this.$refs.date_input.value);
            if (this.dateFormat) {
                // console.log(this.dateFormat);
                this.formated_value = date.format(this.dateFormat)
            } else {
                this.formated_value = date.format('DD MMMM YYYY')
            }
            if (this.onchange) {
                this.onchange(event)
            }
        },



    },


}
</script>

<style></style>
