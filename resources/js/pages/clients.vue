<template>
    <b-card header="Clients">
        <div style="width:70%;float:left">
        <b-button v-b-modal.modal-create class="mb-2" variant="primary">Create Client</b-button>
        </div>
        <div style="width:30%;float:left">
            <b-form> 
                <input type="text"  v-model="searchform.search" />
                <b-button
                        type="button"
                        variant="primary"
                        class="float-right mr-2"
                        @click="search_post()">
                        Search
                    </b-button>
                 </b-form>
         </div>
       
           
        <b-modal v-model="create_modal_show" id="modal-create" no-close-on-backdrop content-class="shadow" title="Create Client">
            <b-form @submit.prevent="register" @keydown="form.onKeydown($event)">
                 <input type="hidden" name="user_id" v-model="form.user_id" />
                <b-form-group
                    label="Company Name:"
                    label-for="company_name">
                    <b-form-input
                        type="text"
                        id="company_name"
                        :class="{ 'is-invalid': form.errors.has('company_name') }"
                        v-model="form.company_name">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="company_name"/>
                </b-form-group>
               
                <b-form-group
                    label="Address:"
                    label-for="address">
                    <b-form-textarea
                        id="address"
                        :class="{ 'is-invalid': form.errors.has('address') }"
                        v-model="form.address"
                        rows="3"
                        max-rows="6">
                    </b-form-textarea>
                    <has-error
                        :form="form"
                        field="address" />
                </b-form-group>
                 <b-form-group
                    label="Phone:"
                    label-for="phone">
                    <b-form-input
                        type="text"
                        id="phone"
                        minlength="10"
                        maxlength="10"
                        :class="{ 'is-invalid': form.errors.has('phone') }"
                        v-model="form.phone">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="phone"/>
                </b-form-group>
                <span>Primary Contact</span><hr>
                 <b-form-group
                    label="Name:"
                    label-for="primary_name">
                    <b-form-input
                        type="text"
                        id="primary_name"
                        :class="{ 'is-invalid': form.errors.has('primary_name') }"
                        v-model="form.primary_name">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="primary_name"/>
                </b-form-group>
               
                <b-form-group
                    label="Email:"
                    label-for="primary_email">
                    <b-form-input
                        type="email"
                        id="primary_email"
                        :class="{ 'is-invalid': form.errors.has('primary_email') }"
                        v-model="form.primary_email">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="primary_email"/>
                </b-form-group>
                 <b-form-group
                    label="Phone:"
                    label-for="primary_phone">
                    <b-form-input
                        type="text"
                        id="primary_phone"
                        minlength="10"
                        maxlength="10"
                        :class="{ 'is-invalid': form.errors.has('primary_phone') }"
                        v-model="form.primary_phone">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="primary_phone"/>
                </b-form-group>

                <span>Secondary Contact</span><hr>
                 <b-form-group
                    label="Name:"
                    label-for="secondary_name">
                    <b-form-input
                        type="text"
                        id="secondary_name"
                        :class="{ 'is-invalid': form.errors.has('secondary_name') }"
                        v-model="form.secondary_name">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="secondary_name"/>
                </b-form-group>
               
                <b-form-group
                    label="Email:"
                    label-for="secondary_email">
                    <b-form-input
                        type="email"
                        id="secondary_email"
                        :class="{ 'is-invalid': form.errors.has('secondary_email') }"
                        v-model="form.secondary_email">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="secondary_email"/>
                </b-form-group>
                 <b-form-group
                    label="Phone:"
                    label-for="secondary_phone">
                    <b-form-input
                        type="text"
                        id="secondary_phone"
                        minlength="10"
                        maxlength="10"
                        :class="{ 'is-invalid': form.errors.has('secondary_phone') }"
                        v-model="form.secondary_phone">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="secondary_phone"/>
                </b-form-group>

                <span>Other Contact</span><hr>
                 <b-form-group
                    label="Name:"
                    label-for="other_name">
                    <b-form-input
                        type="text"
                        id="other_name"
                        :class="{ 'is-invalid': form.errors.has('other_name') }"
                        v-model="form.other_name">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="other_name"/>
                </b-form-group>
               
                <b-form-group
                    label="Email:"
                    label-for="other_email">
                    <b-form-input
                        type="email"
                        id="other_email"
                        :class="{ 'is-invalid': form.errors.has('other_email') }"
                        v-model="form.other_email">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="other_email"/>
                </b-form-group>
                 <b-form-group
                    label="Phone:"
                    label-for="other_phone">
                    <b-form-input
                        type="text"
                        id="other_phone"
                        minlength="10"
                        maxlength="10"
                        :class="{ 'is-invalid': form.errors.has('other_phone') }"
                        v-model="form.other_phone">
                    </b-form-input>
                    <has-error
                        :form="form"
                        field="other_phone"/>
                </b-form-group>
            </b-form>
            <template #modal-footer>
                <div class="w-100">
                    
                    <b-button
                        variant="danger"
                        class="float-right"
                        @click="create_modal_show=false">
                        Close
                    </b-button>
                    <b-button
                        type="submit"
                        variant="primary"
                        class="float-right mr-2"
                        @click="create_post()">
                        Save
                    </b-button>
                </div>
            </template>
        </b-modal>
        <b-modal
            v-model="edit_modal_show"
            id="modal-edit"
            no-close-on-backdrop
            content-class="shadow"
            title="View Client">
            <b-form
                @submit.prevent="register"
                @keydown="editform.onKeydown($event)">
                <b-form-group label="Company Name:"
                    label-for="company_name">
                   {{ editform.company_name }} 
                   
                </b-form-group>
                <b-form-group
                    label="Address:"
                    label-for="edit_address">
                      {{ editform.address }} 
                </b-form-group>
                 <b-form-group
                    label="phone:"
                    label-for="phone">
                      {{ editform.phone }} 
                </b-form-group>
                <span>Primary Contact</span><hr>
                 <b-form-group label="Name:"
                    label-for="name">
                   {{ editform.primary_name }} 
                   
                </b-form-group>
                <b-form-group
                    label="Email:"
                    label-for="email">
                      {{ editform.primary_email }} 
                </b-form-group>
                 <b-form-group
                    label="phone:"
                    label-for="phone">
                      {{ editform.primary_phone }} 
                </b-form-group>
                <span>Secondary Contact</span><hr>
                <b-form-group label="Name:"
                    label-for="name">
                   {{ editform.secondary_name }} 
                   
                </b-form-group>
                <b-form-group
                    label="Email:"
                    label-for="email">
                      {{ editform.secondary_email }} 
                </b-form-group>
                 <b-form-group
                    label="phone:"
                    label-for="phone">
                      {{ editform.secondary_phone }} 
                </b-form-group>
                <span>Other Contact</span><hr>
                <b-form-group label="Name:"
                    label-for="name">
                   {{ editform.other_name }} 
                   
                </b-form-group>
                <b-form-group
                    label="Email:"
                    label-for="email">
                      {{ editform.other_email }} 
                </b-form-group>
                 <b-form-group
                    label="phone:"
                    label-for="phone">
                      {{ editform.other_phone }} 
                </b-form-group>
            </b-form>
            <template #modal-footer>
                <div class="w-100">
                    <b-button
                        variant="danger"
                        class="float-right"
                        @click="edit_modal_show=false">
                        Close
                    </b-button>

                </div>
            </template>
        </b-modal>
       

         <b-table
            striped
            hover
            :items="items"
            :fields="fields"  id="datatable">
            <template
                #cell(action)="data" >
                <b-button
                    size="sm"
                    @click="openModal(data.value)"
                    variant="info">
                    View
                </b-button>
               
            </template>
            <template
                #cell(user)="data" >
                {{ data.value.name }}
            </template>
        </b-table>
        
    </b-card>
    
</template>



<script>
import axios from 'axios';
import Form from "vform";
import toast from '../mixins/message'



export default {
    middleware: 'auth',
    mixins: [toast],
    data() {
        return {
            create_modal_show: false,
            edit_modal_show: false,
            fields: ['company_name', 'primary_email', 'phone', 'action'],
            items: [],
            authors: [],
            searchform:new Form({
                search: ''
            }),
            form: new Form({
                user_id: 0,
            }),
            editform: new Form({
                id: 0,
                user_id: 0,
            })
        }
    },
    methods: {
        async loadAuth () {
            const { data } = await axios.get('/api/users')
            this.authors = data.data;
            this.form.user_id = this.authors[0].id
        },
        async loadPosts () {
            const { data } = await axios.get('/api/clients')
            this.items = data.data;

        },
        openModal(item_id) {
            let item = this.items.find(({id})=>id===item_id)
            this.edit_modal_show = true
            this.editform.id = item.id
            this.editform.company_name = item.company_name
            this.editform.user_id = item.user.id
            this.editform.address = item.address
            this.editform.phone = item.phone
            this.editform.primary_name = item.primary_name
            this.editform.primary_email = item.primary_email
            this.editform.primary_phone = item.primary_phone
            this.editform.secondary_name = item.secondary_name
            this.editform.secondary_email = item.secondary_email
            this.editform.secondary_phone = item.secondary_phone
            this.editform.other_name = item.other_name
            this.editform.other_email = item.other_email
            this.editform.other_phone = item.other_phone
        },

        async search_post() {
            console.log(this.searchform.search);
             const { data } = await axios.get('/api/clients',{ params: { search: this.searchform.search }})
            this.items = data.data;
        },
        async create_post() {
            
            const { data } = await this.form.post('/api/clients')
            if (data.data.id > 0)
            {
                this.$show_message(`Notification`, 'The client was created successfully', 'success');
                this.create_modal_show = false;
                this.loadPosts();
                this.form.user_id = this.authors[0].id
                
            } else {
                this.$show_message(`Notification`, 'Client creating operation was failed', 'danger');
            }
        },
        async save_post() {
            const { data } = await this.editform.post('/api/clients/' + this.editform.id)
            if (data.data.id > 0)
            {
                this.$show_message(`Notification`, 'The client was updated successfully', 'success');
                this.edit_modal_show = false;
                this.loadPosts();
            } else {
                this.$show_message(`Notification`, 'Client updating operation was failed', 'danger');
            }
        },
        async deleteItem(id) {
            const { data } = await this.editform.delete('/api/clients/' + id)
            if (data.status === "success")
            {
                this.$show_message(`Notification`, 'The client was deleted successfully', 'success');
            } else {
                this.$show_message(`Notification`, 'Client deleting operation was failed', 'danger');
            }
            this.loadPosts();
        }
    },
    mounted() {
        this.loadAuth();
        this.loadPosts();
    }
}
</script>
