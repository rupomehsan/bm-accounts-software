<template>
    <div class="page-body">
        <div class="py-2">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6>
                                {{ param_id ? "Update" : "Create new" }} voucher
                            </h6>
                        </div>
                        <div class="col-lg-6 text-end">
                            <div class="btns">
                                <router-link :to="{ name: `BmAllVouchers` }"
                                    class="btn rounded-pill btn-outline-warning router-link-active"><i
                                        class="fa fa-arrow-left me-5px"></i>
                                    Back
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-1 relative">
                    <form @submit.prevent="submitHandler" class="user_create_form card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="admin_form col_2" v-if="loded">
                                        <template v-for="(
                                                form_field, index
                                            ) in form_fields" :key="index">
                                            <common-input :label="form_field.label" :type="form_field.type"
                                                :name="form_field.name" :multiple="form_field.multiple"
                                                :value="form_field.value" :data_list="form_field.data_list
                                                    " />
                                        </template>
                                    </div>
                                    <div class="py-3">
                                        <span>Support voucher list</span>
                                        <i class="icon-plus border p-2 rounded mx-5" @click="addSupportVoucher"></i>
                                    </div>
                                    <div class="row" v-for="(item, index) in support_voucher" :key=index>
                                        <input v-if="param_id" type="hidden" :name="'support_voucher[' + index + '][id]'"
                                            id="" :value="item.id">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="my-2">Amount</label>
                                                <input type="number" :data-amount="index"
                                                    :name="'support_voucher[' + index + '][amount]'" class="form-control"
                                                    @change="resetError(); setValue(index)" :value="item.amount">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="form-group">
                                                <label for="" class="my-2">Photo</label>
                                                <div class="row gap-2">
                                                    <div class="col-md-4">
                                                        <input type="file" :data-image="index" @change="resetError()"
                                                            :name="'support_voucher[' + index + '][image]'"
                                                            class="form-control" accept="image/*">
                                                    </div>
                                                    <div class="d-flex gap-1 mx-1 col-md-7 col-sm-6 align-items-center">
                                                        <button type="button" class="btn btn-info btn-sm"
                                                            @click="ApprovedByAdmin(item.id)">{{ item.approved_by_bm ?
                                                                'Approved'
                                                                : 'Notapproved' }}
                                                        </button>
                                                        <button type="button" @click="ApprovalCancel(item.id)"
                                                            class="btn btn-info btn-sm">{{ item.is_canceled ? 'Canceled' :
                                                                'Cancel' }}
                                                        </button>
                                                        <i class="icon-minus " style="cursor: pointer;"
                                                            @click="deleteSupportVoucher(item.id ? { 'is_id': true, 'id': item.id } : { 'is_id': false, 'index': index })"></i>
                                                    </div>
                                                </div>
                                                <img v-if="item.image" class="pointer"
                                                    :src="item.image ?? '/backend/assets/images/avatar.png'" alt=""
                                                    height="30" width="50" @click="viewImage(item.image)">
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-upload"></i>
                                Submit
                            </button>
                        </div>
                    </form>
                    <div class="image-container d-none" id="imageContainer">
                        <button class=" btn-sm btn-info" @click="removeImage">X</button>
                        <img id="zoomImage" src="" alt="" class="relative rounded" @click="zoomIn()">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div :class="modalShow ? 'show d-block' : ''" class="modal fade ">
            <div class="modal-dialog">
                <form @submit.prevent="cancelCommentForm">
                    <input type="hidden" id="voucher_id" name="voucher_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cancel voucher</h5>
                            <button @click="modalShow = !modalShow" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="my-3">Comment for cancelling approval :</label>
                                <textarea class="form-control" name="cancel_comment" id="cancel_comment" cols="30"
                                    rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click="modalShow = !modalShow" type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions, mapState } from "pinia";
import form_fields from "./setup/form_fields.js";
import { voucher_setup_store } from "./setup/store";
import axios from 'axios';
export default {
    data: () => ({
        form_fields,
        param_id: null,
        loded: false,
        support_voucher: [
            {
                amount: '',
                image: '',
                approved_by_bm: 0,
                is_canceled: 0,
            }
        ],
        modalShow: false

    }),

    created: async function () {
        await this.getAllAccountExpenseCategories()
        let id = this.$route.query.id;

        if (this.AllAccountExpenseCategories && this.AllAccountExpenseCategories.length) {
            form_fields.forEach((item) => {
                if (item.name == 'account_expense_category_id') {
                    this.AllAccountExpenseCategories.forEach((data) => {
                        // console.log(data);
                        let dataList = {}
                        dataList.label = data.title
                        dataList.value = data.id
                        item.data_list.push(dataList)
                    })
                }
            })
        }


        if (id) {
            this.param_id = id;
            await this.user_get(id);
            if (this.single_user) {
                form_fields.forEach((field, index) => {
                    Object.entries(this.single_user).forEach((value) => {
                        if (field.name == value[0]) {
                            this.form_fields[index].value = value[1];
                        }

                    });
                });

                if (this.single_user.support_voucher?.length) {
                    this.support_voucher = []
                    this.single_user.support_voucher.forEach((data) => {
                        let dataList = {}
                        dataList.amount = data.amount
                        dataList.id = data.id
                        dataList.image = data.image_url?.url
                        dataList.approved_by_bm = data.approved_by_bm
                        dataList.is_canceled = data.is_canceled
                        this.support_voucher.push(dataList)
                    })

                    console.log(this.support_voucher);
                }
            }
        } else {
            form_fields.forEach((item) => {
                if (item.name !== 'date') item.value = "";
            });
        }

        this.loded = true
    },

    methods: {

        ...mapActions(voucher_setup_store, {
            user_update: "update",
            user_get: "get",
            user_store: "store",
            getAllAccountExpenseCategories: "getAllAccountExpenseCategories",
            SupportVoucherDeleted: "SupportVoucherDeleted",
            SupportVoucherApprovedByAdmin: "SupportVoucherApprovedByAdmin",
            VoucherCancelComment: "VoucherCancelComment",
        }),

        submitHandler: async function ($event) {
            if (this.param_id) {
                let response = await this.user_update($event.target, this.param_id);
                console.log(response);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully Updated");
                } else if (response.data.status === "support_voucher_error") {
                    let index = response.data.index
                    let targetAmount = document.querySelector(`[data-amount="${index}"]`);
                    let targetImage = document.querySelector(`[data-image="${index}"]`);

                    targetAmount.classList.add('border-danger')
                    targetImage.classList.add('border-danger')

                    let existingError = targetAmount.nextElementSibling;

                    if (existingError && existingError.tagName === 'P') {
                        existingError.innerText = "This field is required";
                    } else {
                        let error_section = document.createElement('p');
                        error_section.innerText = "This field is required";
                        error_section.setAttribute('class', 'my-2 text-danger');
                        targetAmount.insertAdjacentElement('afterend', error_section);
                    }

                    let existingErrorImage = targetImage.nextElementSibling;
                    if (existingErrorImage && existingErrorImage.tagName === 'P') {
                        existingErrorImage.innerText = "This field is required";
                    } else {
                        let error_section = document.createElement('p');
                        error_section.innerText = "This field is required";
                        error_section.setAttribute('class', 'my-2 text-danger');
                        targetImage.insertAdjacentElement('afterend', error_section);
                    }

                }
            } else {
                let response = await this.user_store($event.target);
                if (response.data.status === "success") {
                    window.s_alert("Data successcully created");

                } else if (response.data.status === "support_voucher_error") {
                    let index = response.data.index
                    let targetAmount = document.querySelector(`[data-amount="${index}"]`);
                    let targetImage = document.querySelector(`[data-image="${index}"]`);

                    targetAmount.classList.add('border-danger')
                    targetImage.classList.add('border-danger')

                    let existingError = targetAmount.nextElementSibling;

                    if (existingError && existingError.tagName === 'P') {
                        existingError.innerText = "This field is required";
                    } else {
                        let error_section = document.createElement('p');
                        error_section.innerText = "This field is required";
                        error_section.setAttribute('class', 'my-2 text-danger');
                        targetAmount.insertAdjacentElement('afterend', error_section);
                    }

                    let existingErrorImage = targetImage.nextElementSibling;
                    if (existingErrorImage && existingErrorImage.tagName === 'P') {
                        existingErrorImage.innerText = "This field is required";
                    } else {
                        let error_section = document.createElement('p');
                        error_section.innerText = "This field is required";
                        error_section.setAttribute('class', 'my-2 text-danger');
                        targetImage.insertAdjacentElement('afterend', error_section);
                    }

                }
            }
        },

        addSupportVoucher() {
            if (this.support_voucher.length < 10) {
                let data = {}
                data.amount = '',
                    data.image = '',
                    this.support_voucher.push(data)
            } else {
                window.s_alert('Sorry, you are not allowed to add more than 10.')
            }
        },

        async deleteSupportVoucher(data) {
            if (data.is_id) {
                await this.SupportVoucherDeleted(data.id)

            } else {
                this.support_voucher = this.support_voucher.filter((item, i) => i !== data.index);
            }
        },

        deleteSupportVoucherIndex(index) {
            this.support_voucher = this.support_voucher.filter((item, i) => i !== index);
        },

        resetError() {
            let target = event.target
            if (target) {
                target.classList.remove('border-danger')
                target.nextElementSibling?.remove()
            }
        },

        setValue(index) {
            let value = event.target.value
            this.support_voucher[index].amount = value
        },

        viewImage(url) {
            let target = document.getElementById('imageContainer');
            target.classList.remove('d-none');
            let imageElement = target.querySelector('img');
            imageElement.setAttribute('src', url);
        },

        zoomIn() {
            const image = document.getElementById('zoomImage');
            image.classList.toggle('zoomed');
        },

        removeImage() {
            let target = document.getElementById('imageContainer');
            target.classList.add('d-none');
        },

        ApprovedByAdmin(id) {
            this.SupportVoucherApprovedByAdmin(id)
        },

        async ApprovalCancel(id) {
            let response = await axios.get(`get-single-supoort-voucher/${id}`)
            let comment = response.data?.data?.cancel_comment
            this.modalShow = true
            $('#voucher_id').val(id)
            $('#cancel_comment').val(comment)
        },

        async cancelCommentForm() {
            let response = await this.VoucherCancelComment(event.target)
            if (response.data.status === "success") {
                this.modalShow = false
                window.s_alert(response.data.message);
            }
        }

    },
    computed: {
        ...mapState(voucher_setup_store, {
            single_user: "single_data",
            AllAccountExpenseCategories: "AllAccountExpenseCategories"
        }),
    },
};
</script>

<style></style>

